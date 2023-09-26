const song_image = document.getElementById("song_image");
song_image.addEventListener("change", function (e) {
      const file = e.target.files[0];//複数ファイルはfiles配列をループで回す
      const reader = new FileReader();
      const image = document.getElementById("image");
      reader.addEventListener("load", function () {
        image.src = reader.result;
      }, false);

      if (file) {
        reader.readAsDataURL(file);
      }
    })