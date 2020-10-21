// const Upload_Image = document.getElementById('Upload_Image');

// Upload_Image.addEventListener('change', function (input) {
//     const Show_Image = document.getElementById('Show_Image');
//     const Image = input.target.files;

//     const Reader = new FileReader();
//     Reader.onload = function (event) {
//         Show_Image.setAttribute('src', event.target.result);
//     }
//     Reader.readAsDataURL(Image[0]);
// });





$(document).ready(function () {



    $('.Modal-Show').on('click', function () { 
        const Search = $(this).attr('id').split("-");
        const Action = Search[0];
        const Title = Search[1];
        
        $(this).attr('data-target', '#Show-'+ $(this).attr('id'));
        $('.modal').attr('id', 'Show-' + $(this).attr('id'));

        if (Title == "Device") {
            $('.modal-dialog').addClass('modal-xl');
        } else { 
            $('.modal-dialog').addClass('modal-lg');
        }

        if ($('input[type=file]').attr('type') == "file") { 
            $('form').attr('enctype','multipart/form-data');
        }

        $('h4').addClass('text-bold');
        $('.modal-title').html(Action + ' ' + Title);

        $('.modal-footer button[type=submit]').attr('name', $(this).attr('id')).html(Action + ' ' + Title);
    });


    $('#File-Device').on('change', function (input_image) { 

        const ReadImage = new FileReader();
        ReadImage.onload = function (event) { 
            $('#Show-File-Device').attr('src', event.target.result);
            $('label[for=File-Device]').html('AutoRename.jpg');
        }
        ReadImage.readAsDataURL(input_image.target.files[0]);

    });









    $('#Button_Search_Salary').on('mouseover', function () {
        $(this).html('Otomatis');
     });
    $('#Button_Search_Salary').on('mouseout', function () {
        $(this).html('<i class="fas fa-search">'+'</i> Search');
    });

    $("#Checked_Salary_Master").change(function () {
        $(".Checked_Salary").prop("checked", $(this).prop("checked"))
    });

    $(".Checked_Salary").change(function () {
        if ($(this).prop("checked") == false) {
            $("#Checked_Salary_Master").prop("checked", false)
        }
        if ($(".Checked_Salary:checked").length == $(".Checked_Salary").length) {
            $("#Checked_Salary_Master").prop("checked", true)
        }
    });

    $('#Search_Salary').on('keyup', function () {
        if ($("#Checked_Salary_Master").prop("checked", true)) { 
            $("#Checked_Salary_Master").prop("checked", false)
        }
        $('#Body_Salary').load('view/Departement/HRD/Search.php?Search='+ $('#Search_Salary').val());
    });

// ---------------------------------------------------------------------------------------------------------------
    $('#Convert_PDF').attr('name', 'Convert_PDF_DateNow');
    $('#Download_PDF').attr('name', 'Download_PDF_DateNow');

    
    
    $("#Checked_Maintenance_Master").change(function () {
        $(".Checked_Maintenance").prop("checked", $(this).prop("checked"))
    });

    $(".Checked_Maintenance").change(function () {
        $('#Convert_PDF').attr('name','Convert_PDF_All');
        $('#Download_PDF').attr('name','Download_PDF_All');

        if ($(this).prop("checked") == false) {
            $("#Checked_Maintenance_Master").prop("checked", false)
        }
        if ($(".Checked_Maintenance:checked").length == $(".Checked_Maintenance").length) {
            $("#Checked_Maintenance_Master").prop("checked", true)
        }
    });

    $('#Search_Maintenance').on('keyup', function () {
        if ($("#Checked_Maintenance_Master").prop("checked", true)) { 
            $("#Checked_Maintenance_Master").prop("checked", false)
        }
        $('#Body_Maintenance').load('view/Departement/ICT/Search.php?Search='+ $('#Search_Maintenance').val());
    });








    $('#Share_PDF_All').on('click', function () {
        $('#Report_Salary').attr('target', '');
    });
    
    $('#Update_set_email').on('click', function () { 
        $('#Show_set_email').attr('hidden',true);
        $('#Form_set_email').attr('hidden',false);
    });

    $('#Cencal_Set_Email').on('click', function () {
        $('#Show_set_email').attr('hidden',false);
        $('#Form_set_email').attr('hidden',true);
    });


    
    
    $('#Choose_User_Device').on('change', function () { 
        console.log($(this).val());
        $('#Choose_User').attr('hidden', true);
        if ($(this).val() == 'Student') {
            $('#Choose_Device_User').append('<div class="form-group row" hidden>'+'<label for="Device_User" class="col-sm-3 col-form-label text-right">Device User</label>'+'<div class="col-sm-9">'+'<input name="Device_User" id="Device_User" type="text" class="form-control text-bold" value="Student">'+'</div>'+'</div>'+'<div class="form-group row">'+'<label for="Device_User_Location" class="col-sm-3 col-form-label text-right">Device Location</label>'+'<div class="col-sm-9">'+'<select name="Device_User_Location" id="Device_User_Location" class="form-control text-bold  text-center">'+'<option selected disabled value="0" class="text-bold bg-danger">Choose Location . . .</option>'+'<option value="G1" class="text-bold">G1</option>'+'<option value="G2" class="text-bold">G2</option>'+'<option value="G3" class="text-bold">G3</option>'+'<option value="G4" class="text-bold">G4</option>'+'<option value="G5" class="text-bold">G5</option>'+'<option value="Lab 1" class="text-bold">Lab 1</option>'+'<option value="Lab 2" class="text-bold">Lab 2</option>'+'<option value="Aula" class="text-bold">Aula</option>'+'</select>'+'</div>'+'</div>');
        } else { 
            $('#Choose_Device_User').append('<div class="form-group row">'+'<label for="Device_User" class="col-sm-3 col-form-label text-right">Device User</label>'+'<div class="col-sm-9">'+'<input name="Device_User" id="Device_User" type="text" class="form-control text-bold">'+'</div>'+'</div>'+'<div class="form-group row">'+'<label for="Device_User_Location" class="col-sm-3 col-form-label text-right">Device Location</label>'+'<div class="col-sm-9">'+'<select name="Device_User_Location" id="Device_User_Location" class="form-control text-bold  text-center">'+'<option selected disabled value="0" class="text-bold bg-danger">Choose Location . . .</option>'+'<option value="Branch Manager" class="text-bold">Branch Manager</option>'+'<option value="Corporate and Placement" class="text-bold">Corporate and Placement</option>'+'<option value="Education" class="text-bold">Education</option>'+'<option value="Finance & Human Resource Departement" class="text-bold">Finance & Human Resource Departement</option>'+'<option value="Informatics Computer Tecnology" class="text-bold">Informatics Computer Tecnology</option>'+'<option value="Marketing" class="text-bold">Marketing</option>'+'</select>'+'</div>'+'</div>');
        }

    });

    
    $('#Add-From-Hardware').on('click', function () { 
        $('#New-From-Hardware').append('<div class="col-sm-4"><div class="form-group">'+'nput name="Hardware_Name[]" type="text" class="form-control form-control-sm text-bold"></div></div><div class="col-sm-4"><div class="form-group"><input name="Hardware_Brand[]" type="text" class="form-control form-control-sm text-bold"></div></div><div class="col-sm-4"><div class="form-group"><input name="Hardware_Specification[]" type="text" class="form-control form-control-sm text-bold"></div></div>');
    });

});