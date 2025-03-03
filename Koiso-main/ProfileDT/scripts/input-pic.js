const inputfile1 = document.querySelector('#picture-input');

const pictureimage1 = document.querySelector('.picture-image');

const pictureimagetxt1 = "";
pictureimage1.innerHTML = pictureimagetxt1

inputfile1.addEventListener('change', function(e) {
    const inputTarget1 = e.target;
    const file1 = inputTarget1.files[0];
    
    if (file1) {
        const reader1 = new FileReader();

        reader1.addEventListener('load', function(e) {
            const readertarget1 = e.target;

            const img1 = document.createElement('img');
            img1.src = readertarget1.result;
            img1.classList.add('picture__img')

            pictureimage1.innerHTML = '';
            pictureimage1.appendChild(img1);
        });

        reader1.readAsDataURL(file1);
      pictureimage1.innerHTML = 'image selected';
    } else {
      pictureimage1.innexHTML = pictureimagetxt1;
    }
})




const inputfile2 = document.querySelector('#banner-input');

const pictureimage2 = document.querySelector('.banner-image');

const pictureimagetxt2 = "";
pictureimage2.innerHTML = pictureimagetxt2

inputfile2.addEventListener('change', function(e) {
    const inputTarget2 = e.target;
    const file2 = inputTarget2.files[0];
    
    if (file2) {
        const reader2 = new FileReader();

        reader2.addEventListener('load', function(e) {
            const readertarget2 = e.target;

            const img2 = document.createElement('img');
            img2.src = readertarget2.result;
            img2.classList.add('picture__img')

            pictureimage2.innerHTML = '';
            pictureimage2.appendChild(img2);
        });

        reader2.readAsDataURL(file2);
      pictureimage2.innerHTML = 'image selected';
    } else {
      pictureimage2.innexHTML = pictureimagetxt2;
    }
})