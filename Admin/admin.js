// input file
document.getElementById('fileInput').addEventListener('change', function() {
    var fileName = this.files[0].name;
    document.getElementById('selectedFileName').innerText = fileName;
  });
  