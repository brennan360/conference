$(function() {

    // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#uploadfile h1").text("Drag here");
    });
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#uploadfile1 h1").text("Drag here");
    });

    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Drag enter
    $('.upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#uploadfile h1").text("Drop");
    });
    $('.upload-area1').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#uploadfile1 h1").text("Drop");
    });

    // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#uploadfile h1").text("Drop");
    });
    $('.upload-area1').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#uploadfile1 h1").text("Drop");
    });

    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("#uploadfile h1").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();

        fd.append('file', file[0]);
		fd.append('company_id', $('input[name=company_id]').val());
		fd.append('module', $('input[name=controller]').val());

        uploadData(fd);
    });
    $('.upload-area1').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("#uploadfile1 h1").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();

        fd.append('file', file[0]);
		fd.append('company_id', $('input[name=company_id]').val());
		fd.append('module', $('input[name=controller]').val());

        uploadData1(fd);
    });

    // Open file selector on div click
    $("#uploadfile").click(function(){
        $("#file").click();
    });
    $("#uploadfile1").click(function(){
        $("#file1").click();
    });

    // file selected
    $("#file").change(function(){
        var fd = new FormData();

        var files = $('#file')[0].files[0];

        fd.append('file',files);
		fd.append('company_id', $('#company-id').val());
		fd.append('module', $('#controller').val());

        uploadData(fd);
    });
    $("#file1").change(function(){
        var fd = new FormData();

        var files = $('#file1')[0].files[0];

        fd.append('file',files);
		fd.append('company_id', $('#company-id').val());
		fd.append('module', $('#controller').val());

        uploadData(fd);
    });
});

// Sending AJAX request and upload file
function uploadData(formdata){
	$("#uploadfile div.thumbnail").remove(); // remove the previous file
	
    $.ajax({
        url: '/locations/upload-image',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            addThumbnail(response);
			populateFormField(response);
        }
    });
}
function uploadData1(formdata){
	$("#uploadfile1 div.thumbnail").remove(); // remove the previous file
	
    $.ajax({
        url: '/locations/upload-image',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            addThumbnail1(response);
			populateFormField1(response);
        }
    });
}

// Added thumbnail
function addThumbnail(data){
    $("#uploadfile h1").remove();
	var len = $("#uploadfile div.thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
    $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
    $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

}
function addThumbnail1(data){
    $("#uploadfile1 h1").remove();
	var len = $("#uploadfile1 div.thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile1").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
    $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
    $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

}

// Added thumbnail
function populateFormField(data)
{
	var module = document.getElementsByName('controller')[0].value + "_image"
	var field = document.getElementsByName(module);
	field[0].value = data.src;
}
function populateFormField1(data)
{
	var module = document.getElementsByName('controller')[0].value + "_image"
	var field = document.getElementsByName(module);
	field[0].value = data.src;
}


// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}