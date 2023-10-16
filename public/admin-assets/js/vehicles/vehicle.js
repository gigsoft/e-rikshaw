var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, true);

function previewImgs(event) {
    totalFiles = imgUpload.files.length;
    if(!!totalFiles) {
        imgPreview.classList.remove('img-thumbs-hidden');
    }
    if (totalFiles > 5) {
        alert('You can only upload a maximum of 5 files.');
        imgUpload.value = ''; // Clear the file input
        return;
    }

  for(var i = 0; i < totalFiles; i++) {
    wrapper = document.createElement('div');
    wrapper.classList.add('wrapper-thumb');
    removeBtn = document.createElement("span");
    nodeRemove= document.createTextNode('x');
    removeBtn.classList.add('remove-btn');
    removeBtn.appendChild(nodeRemove);
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    wrapper.appendChild(img);
    wrapper.appendChild(removeBtn);
    imgPreview.appendChild(wrapper);

    $('.remove-btn').click(function(){
      $(this).parent('.wrapper-thumb').remove();
    });

  }


}


  // Function to update the preview image when a file is selected
  function updatePreviewImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    const image = document.getElementById(imageId);

    input.addEventListener('change', function () {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                image.src = e.target.result;
                image.style.display = 'block'; // Show the image when a file is selected
            };

            reader.readAsDataURL(input.files[0]);
        } else {
           // Hide the image when no file is selected
        }
    });
}

// Call the updatePreviewImage function for each file input
updatePreviewImage('profile_image', 'preview_profile_image');
updatePreviewImage('adhar_card', 'preview_adhar_card');
updatePreviewImage('pan_card', 'preview_pan_card');
updatePreviewImage('electricty_bill', 'preview_electricty_bill');
updatePreviewImage('bank_copy', 'preview_bank_copy');
updatePreviewImage('gprofile_image', 'gpreview_profile_image');
updatePreviewImage('gadhar_card', 'gpreview_adhar_card');
updatePreviewImage('gpan_card', 'gpreview_pan_card');

// Hide all preview images initially
// const previewImages = document.querySelectorAll('.preview-image');
// previewImages.forEach(function (image) {
//     image.style.display = 'none';
// });


window.onload = function(){

    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");

        filesInput.addEventListener("change", function(event){

            var files = event.target.files; //FileList object
            var output = document.getElementById("result");

            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];

                //Only pics
                if(!file.type.match('image'))
                  continue;

                var picReader = new FileReader();

                picReader.addEventListener("load",function(event){

                    var picFile = event.target;

                    var div = document.createElement("div");

                    div.innerHTML = "<img class='output_multiple_image' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";

                    output.insertBefore(div,null);

                });

                 //Read the image
                picReader.readAsDataURL(file);
            }

        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
    }
