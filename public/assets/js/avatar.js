(function () {
    "use strict";
    
    var fileSelect = document.forms.upload.fileselect,
        imageList = document.querySelector('.image-list'),
        selectBtn = document.getElementById('selectbtn'),
        upload = document.querySelector('.upload');
    
    // If user dragover image, stop event default action
    function onDragOver(event) {
        event.stopPropagation();
        event.preventDefault();
    }
    
    // If it has image, show image in browser
    function displayImage(event) {
        // Stop event default action
        event.stopPropagation();
        event.preventDefault();
        
        var images = event.target.files || event.dataTransfer.files,
            i = 0,
            imageNum = document.createElement('span'),
            imageNumHave = document.querySelector('.num');
        
        // Clear imageList content
        imageList.innerHTML = '';
        // Show the images
        for(i = 0; i < 1; i += 1) {
            var img = document.createElement('img'),
                url = window.URL.createObjectURL(images[i]);
            img.src = url;
            img.setAttribute('id', 'user_avatar');
            imageList.appendChild(img);
        }
        fileSelect.files = images;
        
        // Show the images num
        if(imageNumHave){
            upload.removeChild(imageNumHave);    
        }
        //imageNum.classList.add('pull-right','num');
        //imageNum.innerHTML = images.length;
        //upload.appendChild(imageNum);
    }
    
    // If no image in imageList zone, show "Drag You Image In There"
    imageList.innerHTML = '<p class="hint text-color-gray text-center">支持图片拖拽</p>';
    
    // If selectbtn clicked, call fileselect to be clicke.
    selectBtn.addEventListener('click', function () {
        fileSelect.click();
    }, false);

    // If user drop image, call function "displayImage"
    imageList.addEventListener('drop', displayImage,  false);
    
    // If user dragover image, call function "onDragOver"
    imageList.addEventListener('dragover', onDragOver, false);
    
    // If user touch btn and upload file, call function "displayImage"
    fileSelect.addEventListener('change', displayImage, false);
}());