
// Función para cambiar el texto de los elementos con parámetros
let FLIDSelect = null;
let EventListenerInput = null;
let functionEventListener = null;

function CreateFLSelector(selectId, title = "", maxOptions = 2, desc = "") {
    CreateFLAlert(title, desc, selectId, maxOptions); // Llama a CreateFLAlert con el ID del select como parámetro
}

function CreateFLSelectorSearch(selectId, title="", maxOptions= 2, desc = "") {
    const elementSelected = document.getElementById(selectId);
    const searchType = elementSelected.getAttribute("api-type");
    CreateFLAlert(title, desc, selectId, maxOptions, searchType);
}


function CreateFLAlert(title, desc, idObject, maxOptions = 2, searchType="") {
    const titleElement = document.getElementById('fllayertitle-fancy');
    const descElement = document.getElementById('fllayerdesc-fancy');
    if (titleElement && descElement) {
        titleElement.textContent = title;
        descElement.innerHTML = sanitizerCode(processHTMLContent(desc));
        document.getElementById("gd-fancy-box").style.display = "flex";
        setTimeout(function() {
            document.querySelector(".fancy-box").style.transform = "scale(1)";
        }, 10);
    }  



    if (idObject) {
        

        FLIDSelect = idObject;
        const selectElement = document.getElementById(idObject);
        const optionsContainer = document.getElementById('options-fl-layer-fancy');
        
        if(searchType == "levels") {
            let apiURL = selectElement.getAttribute("api-url") || "../api/search.php";
            
            EventListenerInput = document.getElementById("flayersearch-layer-fancy");

            EventListenerInput.style.display = "flex";

            functionEventListener = eventListenerSearchType(apiURL,selectElement,optionsContainer,maxOptions)

            EventListenerInput.addEventListener("input", functionEventListener);
        }
        
        
        if (selectElement && optionsContainer) {
            genMoreFLElements(selectElement,optionsContainer,maxOptions)
        }
    }
}

function eventListenerSearchType (apiURL,selectElement,optionsContainer,maxOptions) {

    return function(event) {

        let fetchURLAPI = `${apiURL}?levelName=${event.target.value}&page=0`

        selectElement.innerHTML = "";
        Fetch(fetchURLAPI).then(data => {

            console.log(data);
            data.forEach(item => {
                if (item) { 
                    const option = document.createElement("option");
                    option.value = item.id; 
                    option.textContent = `${item.name.length > 13 ? item.name.slice(0, 13) + "..." : item.name} (ID: ${item.id})`;
                    selectElement.appendChild(option);
                }
            });
            genMoreFLElements(selectElement,optionsContainer,maxOptions)
        });
    }
}

function genMoreFLElements(selectElement,optionsContainer,maxOptions) {
    const options = Array.from(selectElement.querySelectorAll('option'));
            const isMultiple = selectElement.hasAttribute('multiple');
            const selectedOptions = options.filter(option => option.selected);

            optionsContainer.innerHTML = ''; 

            options.map(option => {
                const div = document.createElement('div');
                div.classList.add('gdsCheckboxItems'); 

                const checkbox = document.createElement('input');
                checkbox.classList.add('gdsCheckbox');
                checkbox.type = 'checkbox';
                checkbox.id = `customsong${option.value}`; 
                checkbox.value = option.value; 
                checkbox.checked = selectedOptions.some(selectedOption => selectedOption.value === option.value); 
                
                //checkbox.disabled = isMultiple && selectedOptions.length >= maxOptions && !selectedOptions.some(selectedOption => selectedOption.value === option.value); 
                
                div.appendChild(checkbox);

                const labelForCheckbox = document.createElement('label');
                labelForCheckbox.classList.add('checkbutton-container'); 
                labelForCheckbox.htmlFor = `customsong${option.value}`;
                div.appendChild(labelForCheckbox);

                const labelText = document.createElement('label');
                labelText.classList.add('gdfont-Pusab', 'small'); 
                labelText.htmlFor = `customsong${option.value}`; 
                labelText.textContent = option.textContent; 
                div.appendChild(labelText);

                div.appendChild(document.createElement('br'));


                var optionsChecked = 0;
                checkbox.addEventListener('change', function() {
                    
                    if (!isMultiple) {
                        const checkboxes = Array.from(optionsContainer.querySelectorAll('.gdsCheckbox'));
                        checkboxes.map( chk => { if (chk !== this && chk.checked) {chk.checked = false;} });
                    } else {
                        const checkedArray = Array.from(optionsContainer.querySelectorAll('.gdsCheckbox')).map(chk => chk.checked);
                        optionsChecked = checkedArray.filter(checked => checked).length;
                    }

                    if (this.checked) {
                        if (optionsChecked > maxOptions && isMultiple) {

                        } else {
                            option.selected = true;
                        }
                    } else {
                        option.selected = false; 
                    }

                    optionsChecked = 0;
                });

                optionsContainer.appendChild(div);
            });
}


function CreateFLBrownAlert(title, desc, frameurl) {
    const titleElement = document.getElementById('fllayertitle-brown');
    const descElement = document.getElementById('fllayerdesc-brown');
    const iFrameElement = document.getElementById("fllayeriframe-brown");
    iFrameElement.style.display = "none";
    if (titleElement && descElement) {
        titleElement.textContent = title;
        descElement.innerHTML = sanitizerCode(processHTMLContent(desc));
        document.getElementById("gd-brown-box").style.display = "flex";
        setTimeout(function() {
            document.querySelector(".brown-box").style.transform = "scale(1)";
        }, 10);
    }
    if (frameurl !== ""){
        document.getElementById("fllayeriframe-brown-rotating-img").style.display = "flex";
        iFrameElement.src = frameurl;
        document.getElementById("gd-brown-box").style.display = "flex";
        setTimeout(function() {
            document.querySelector(".brown-box").style.transform = "scale(1)";
        }, 10);
    }
}

  
document.getElementById("gdclose-fancy-btn").addEventListener("click", function() {
    if(functionEventListener && EventListenerInput) {
        EventListenerInput.removeEventListener('input', functionEventListener);
        functionEventListener = null;
        EventListenerInput.style.display = "none";
        EventListenerInput.value = "";
        EventListenerInput = null;
    }
    
    document.getElementById("gd-fancy-box").style.display = "none";
    document.querySelector(".fancy-box").style.transform = "scale(0)";
    document.getElementById('options-fl-layer-fancy').innerHTML = "";
    document.dispatchEvent(new Event('FLlayerclosed'));
    FLIDSelect = null;
});

document.getElementById("gdclose-brown-btn").addEventListener("click", function() {
    document.getElementById("gd-brown-box").style.display = "none";
    document.querySelector(".brown-box").style.transform = "scale(0)";
    document.getElementById("fllayeriframe-brown").src = "";
    document.dispatchEvent(new Event('FLlayerclosed'));
    FLIDSelect = null;
});

document.getElementById("fllayeriframe-brown").onload = function() {
    document.getElementById("fllayeriframe-brown").style.display = "flex";
    document.getElementById("fllayeriframe-brown-rotating-img").style.display = "none";
};