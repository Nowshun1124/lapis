    const input_file = document.getElementById("input_file");
    input_file.addEventListener("change", function (e) {
      const file = e.target.files[0];//複数ファイルはfiles配列をループで回す
      const reader = new FileReader();
      const image = document.getElementById("post_image");
      reader.addEventListener("load", function () {
        image.src = reader.result;
      }, false);

      if (file) {
        reader.readAsDataURL(file);
      }
    })