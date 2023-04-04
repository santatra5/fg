window.addEventListener('DOMContentLoaded', function () {
    var imageIcon = document.querySelector('.fa-image');
    var navBar = document.querySelector('.navbar-nav');
    if (imageIcon) {
        imageIcon.addEventListener('click', function () {
            navBar.classList.toggle('menu-extended');
        });
    }
});

function editeurText() {
    const editorText = document.getElementById("kl-text-content");
    editorText.classList.toggle("display");
    const editorEmoji = document.getElementById("kl-emoji-content");
    const editorImg = document.getElementById("kl-img-content");
    if (editorEmoji.classList.contains('display') || editorImg.classList.contains('display')) {
        editorEmoji.classList.remove("display");
        editorImg.classList.remove("display");
    }
}

function editeurEmoticon() {
    const editorEmoji = document.getElementById("kl-emoji-content");
    editorEmoji.classList.toggle("display");
    const editorText = document.getElementById("kl-text-content");
    const editorImg = document.getElementById("kl-img-content");
    if (editorText.classList.contains('display') || editorImg.classList.contains('display')) {
        editorText.classList.remove("display");
        editorImg.classList.remove("display");
    }
}

function editeurImage() {
    const editorImg = document.getElementById("kl-img-content");
    editorImg.classList.toggle("display");
    const editorText = document.getElementById("kl-text-content");
    const editorEmoji = document.getElementById("kl-emoji-content");
    if (editorText.classList.contains('display') || editorEmoji.classList.contains('display')) {
        editorText.classList.remove("display");
        editorEmoji.classList.remove("display");
    }
}

/*editeur de text start*/
const fontStyleSelect = document.querySelector('.font-style');
const fontSizeSelect = document.querySelector('.font-size');
const textColorPicker = document.querySelector('.text-color');

const previewText = document.getElementById("preview-text");


const input = document.getElementById("preview-text");
//const text = document.getElementById("kl-text");

fontStyleSelect.addEventListener("change", function () {
    previewText.style.fontFamily = fontStyleSelect.value;
//text.style.fontFamily = previewText.style.fontFamily;
});
fontSizeSelect.addEventListener("change", function () {
    previewText.style.fontSize = fontSizeSelect.value;
//text.style.fontSize = previewText.style.fontSize;
});
textColorPicker.addEventListener("change", function () {
    previewText.style.color = textColorPicker.value;
//text.style.color = previewText.style.color;
});
// input.addEventListener("input", (e) => {
// });

function afficherText() {
    emoji(previewText.innerHTML);
}

/* editeur text end*/

/* capturer l'image start*/
// Récupérer la section que vous voulez capturer dans un div
const sectionToCapture = document.getElementById("myPng");
// Créer un canvas qui sera utilisé pour afficher la capture d'écran
const canvas = document.createElement("canvas");

function downloadImage() {
// Définir la taille du canvas
    canvas.width = sectionToCapture.offsetWidth;
    canvas.height = sectionToCapture.offsetHeight;

// Dessiner la section sur le canvas en utilisant html2canvas
    html2canvas(sectionToCapture).then(function (canvas) {
// Récupérer l'objet de contexte de rendu du canvas
        const context = canvas.getContext("2d");
// Créer un lien pour télécharger l'image
        const link = document.createElement("a");

// Définir l'attribut href du lien avec l'URL de l'image
        link.href = canvas.toDataURL("image/png");

// Définir l'attribut download du lien avec le nom du fichier
        link.download = "capture.png";

// Cliquer sur le lien pour télécharger l'image
        link.click();
        ;
    });
}

/* fin de la capture image */

function emoji(emojiCode) {
    if (emojiCode != document.getElementById('image')) {
        function containsEmoji(str) {
            return /[\u{1F300}-\u{1F64F}\u{1F680}-\u{1F6FF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{1F900}-\u{1F9FF}]/u.test(str);
        }

        var newElement = document.createElement("p");
        newElement.textContent = emojiCode;
// Ajoute la classe resize-text à l'élément p
        newElement.classList.add('resize-text');
//newElement.style.fontSize = fontSizeSelect.value;
        newElement.style.fontFamily = previewText.style.fontFamily;
        newElement.style.color = textColorPicker.value;

// Ajoute l'attribut ondblclick à l'élément p
        newElement.setAttribute('ondblclick', 'resizeBorder(this)');

// Ajoute l'élément p au parent

        function generateNewId() {
            return 'resizable-div-' + Math.floor(Math.random() * 100000);
        }

//clonage start avec new id
        var emoticone = document.querySelector('.draggable');
        var clone = emoticone.cloneNode(true);
        clone.appendChild(newElement);
        clone.classList.toggle("display-none");
        clone.children[3].remove();
        clone.children[3].remove();
        if (containsEmoji(emojiCode) == false) {
            clone.querySelector('.resize-handle').classList.add('display-none-none');

            clone.children[3].style.fontFamily = fontStyleSelect.value;
//text.style.fontFamily = previewText.style.fontFamily;


            clone.children[3].style.fontSize = fontSizeSelect.value;
//text.style.fontSize = previewText.style.fontSize;
            var menu = document.querySelector('.text-style-options');
            var cloneMenu = menu.cloneNode(true);
            clone.children[0].appendChild(cloneMenu);


        }

        if (emojiCode === '❤') {
            clone.children[3].style.cssText = 'color: #dc3545 !important;';
        }
//emoticone.parentNode.insertBefore(clone, emoticone.nextSibling);
        emoticone.insertAdjacentElement('afterend', clone);
    } else {

        var newElementImage = document.createElement("img");
        var input = document.getElementById('image-input');
        emojiCode.src = URL.createObjectURL(input.files[0]);
//clonage start avec new id
        var emoticoneImage = document.querySelector('.draggable');
        var cloneImage = emoticoneImage.cloneNode(true);
        cloneImage.appendChild(newElementImage);
        cloneImage.classList.toggle("display-none");
        cloneImage.style.maxWidth = "350px";
        emoticoneImage.parentNode.insertBefore(cloneImage, emoticoneImage.nextSibling);
        input.value = "";
    }

}

document.addEventListener("mouseup", function () {
    activeElement = null;
});

function resizeBorder(emoji) {
    if (emoji.parentNode) {
        emoji.parentNode.classList.toggle('resizeBorder');

        var parentElement = emoji.parentNode;
        var siblingElement1 = parentElement.querySelector(".drag-handle");
        var siblingElement2 = parentElement.querySelector(".resize-handle");
        var siblingElement3 = parentElement.querySelector(".rangeRotate");
        var siblingElement4 = parentElement.querySelector(".rangeOpacity");
        siblingElement1.classList.toggle('d-flex');
        siblingElement1.classList.toggle('visibility');
        siblingElement2.classList.toggle('visibility');
        siblingElement3.classList.toggle('d-flex');
        siblingElement3.classList.toggle('visibility');
        if (siblingElement4) {
            siblingElement4.classList.toggle('d-flex');
            siblingElement4.classList.toggle('visibility');
        }

        function containsEmoji(str) {
            return /[\u{1F300}-\u{1F64F}\u{1F680}-\u{1F6FF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{1F900}-\u{1F9FF}]/u.test(str);
        }

        function isNonEmptyString(str) {
            return typeof str === "string" && str.trim() !== "";
        }

        console.log(!containsEmoji(emoji.textContent));

        if (containsEmoji(emoji.textContent)) {
            emoji.classList.toggle('correctionEmoji');
        } else if (!containsEmoji(emoji.textContent) && isNonEmptyString(emoji.textContent)) {
            emoji.classList.toggle('correctionBorder');
        }
    }

}

function supprimerElementParent(element) {
    if (element.parentNode) {
        element.parentNode.removeChild(element);
    }
}

// fonction pour ajouter les écouteurs d'événements aux nouveaux éléments .draggable
function addEventListenersToNewDraggables(newDraggables) {
    newDraggables.forEach(function (div) {
        const resizeHandle = div.querySelector('.resize-handle');
        const dragHandle = div.querySelector('.drag-handle');
        const resizeText = div.querySelector('p');
        const rotateHandle = div.querySelector('.rotate-handle');
        const image = div.querySelector('.image');
        const opacityHandle = div.querySelector('.opacity-handle');
        if (image) {
            image.classList.add('img', 'img-fluid');
//div.style.maxWidth = '300px';

// Stockez la hauteur de l'élément avant la mutation
            let prevHeight = div.offsetWidth;
// Créez une instance de MutationObserver
            const observer = new MutationObserver((mutations) => {
// Itérez sur les mutations et vérifiez si l'offsetHeight a changé
                mutations.forEach((mutation) => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                        const currHeight = div.offsetWidth;
                        if (prevHeight !== currHeight) {
// La hauteur de l'élément a changé
                            image.style.width = div.offsetWidth;
// Mettez à jour la hauteur précédente
                            prevHeight = currHeight;
                        }
                    }
                });
            });
// Configurez l'observer pour écouter les changements de style
            const config = {attributes: true, attributeOldValue: true, attributeFilter: ['style']};
            observer.observe(div, config);
        }
//menu edit
        const fontStyleSelect = div.querySelector('.font-style');
        const fontSizeSelect = div.querySelector('.font-size');
        const textColorPicker = div.querySelector('.text-color');
        const newTextModif = div.querySelector('.resize-text');
//const input = document.getElementById("preview-text");
//const text = document.getElementById("kl-text");
        if (fontStyleSelect) {
            fontStyleSelect.addEventListener("change", function () {
                newTextModif.style.fontFamily = fontStyleSelect.value;
//text.style.fontFamily = previewText.style.fontFamily;
            });
            fontSizeSelect.addEventListener("change", function () {
                newTextModif.style.fontSize = fontSizeSelect.value;
//text.style.fontSize = previewText.style.fontSize;
            });
            textColorPicker.addEventListener("change", function () {
                newTextModif.style.color = textColorPicker.value;
//text.style.color = previewText.style.color;
            });
        }

// fonction d'opacity

        function handleOpacity() {
            const opacity = opacityHandle.value;

            if (image) {
                image.style.opacity = opacity;
            }
        }

        if (opacityHandle) {
            opacityHandle.addEventListener('input', handleOpacity);
        }


// fonction de rotation
        const container = div;
        const square = image !== null ? image : resizeText;
        const handle = rotateHandle;
        let angle = 0;

        function handleEvent(event) {
            const rect = container.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            const handleX = event.clientX - rect.left;
            const handleY = event.clientY - rect.top;
            if (event.type === 'mousedown') {
                document.addEventListener('mousemove', handleEvent);
                angle = Math.atan2(handleY - centerY, handleX - centerX) * 180 / Math.PI;
            } else if (event.type === 'mousemove') {
                handle.style.left = `${handleX}px`;
                handle.style.top = `${handleY}px`;
                angle = handle.value;
                square.style.transform = `rotate(${angle}deg)`;
            } else if (event.type === 'mouseup') {
                document.removeEventListener('mousemove', handleEvent);
            }
        }

        if (handle) {
            handle.addEventListener('mousedown', handleEvent);
        }
        document.addEventListener('mouseup', handleEvent);

// fonction de redimensionnement
        function resize(e) {
            console.log('e'+e.pageX);
            console.log('div'+div.offsetLeft);
            var containerRect = div.parentNode.getBoundingClientRect(); // obtenir les dimensions du conteneur parent
            var mouseX = e.pageX - containerRect.left; // soustraire la position du conteneur parent de la position de la souris
            var mouseY = e.pageY - containerRect.top;
            div.style.width = mouseX - div.offsetLeft + 'px';
            if (!image) {
                div.style.height = mouseY - div.offsetTop + 'px';
            }
            var divWidth = div.offsetWidth;
            var divHeight = div.offsetHeight;
            var fontSize = Math.min(divWidth / 2, divHeight / 2);
            if (resizeText) {
                // Ajuster la taille de police du texte
                resizeText.style.fontSize = fontSize + "px";
                if (resizeText.offsetWidth > divWidth) {
                    var newFontSize = (divWidth / resizeText.offsetWidth) * fontSize;
                    resizeText.style.fontSize = newFontSize + 'px';
                }
            }
        }



// fonction de glisser-déposer
        function drag(e) {
            const offsetX = e.clientX - div.offsetLeft;
            const offsetY = e.clientY - div.offsetTop;

            function moveDiv(e) {
                div.style.left = e.clientX - offsetX + 'px';
                div.style.top = e.clientY - offsetY + 'px';
            }

            document.addEventListener('mousemove', moveDiv);
            document.addEventListener('mouseup', function stopDragging() {
                document.removeEventListener('mousemove', moveDiv);
                document.removeEventListener('mouseup', stopDragging);
            });
        }

// ajouter des écouteurs d'événements pour les actions de redimensionnement et de glisser-déposer
        if (resizeHandle) {
            resizeHandle.addEventListener('mousedown', function (e) {
                e.preventDefault();

                function resizeDiv(event) {
                    resize(event);
                }

                document.addEventListener('mousemove', resizeDiv);
                document.addEventListener('mouseup', function stopResizing() {
                    document.removeEventListener('mousemove', resizeDiv);
                    document.removeEventListener('mouseup', stopResizing);
                });
            });
        }

        if (dragHandle) {
            dragHandle.addEventListener('mousedown', function (e) {
                drag(e);
            });
        }
    });
}

// observer les changements dans le DOM
const observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
        if (mutation.addedNodes) {
            const newDraggables = Array.from(mutation.addedNodes).filter(function (node) {
                return node.classList && node.classList.contains('draggable');
            });

            if (newDraggables.length > 0) {
                addEventListenersToNewDraggables(newDraggables);
            }
        }
    });
});

// observer les changements dans le corps de la page
observer.observe(document.body, {childList: true, subtree: true});
// ajouter les écouteurs d'événements initiaux aux éléments existants
const divs = document.querySelectorAll('.draggable');
addEventListenersToNewDraggables(divs);

function slider(img) {
    const AddImg = document.querySelector('.carousel-item.active');
// Récupérez l'URL de l'image cliquée
    const imgUrl = img.src;
// Remplacez l'image dans le div
    AddImg.innerHTML = `<img src="${imgUrl}" class='d-block w-100'>`;
}

//effet text
// Récupère l'élément avec l'ID "text"
var text = document.getElementById("detail");

// Définit le texte à écrire
var message = "Boite a bijoux de voyage avec miroir, fermeture zippee. Couleur : noir, rose, rouge, fuchia";

// Définit la vitesse d'écriture (en millisecondes)
var speed = 50;

// Définit une variable pour stocker la position courante dans le texte
var i = 0;

// Définit une fonction pour écrire un caractère à la fois
function writeChar() {
    // Vérifie si toutes les lettres ont été écrites
    if (i < message.length) {
        // Ajoute le caractère suivant au texte
        text.innerHTML += message.charAt(i);
        // Incrémente la position dans le texte
        i++;
        // Appelle cette fonction de nouveau après un délai
        setTimeout(writeChar, speed);
    }
}

// Appelle la fonction pour écrire le texte
writeChar();


