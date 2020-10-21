<?php
if (isset($_GET['Welcome']) && $_GET['Welcome'] === md5('Devices')) {
?>
    <div class="row">

        <div class="col-sm-8">

            <div class="form-group row">
                <label for="Device_Name" class="col-sm-3 col-form-label text-right">Device ID</label>
                <div class="col-sm-9">
                    <input name="Device_Name" id="Device_Name" type="text" class="form-control text-bold" value="<?= SerialGenerate(); ?>" readonly="">
                </div>
            </div>

            <div class="form-group row">
                <label for="Device_Type" class="col-sm-3 col-form-label text-right">Device Type</label>
                <div class="col-sm-9">
                    <select name="Device_Type" id="Device_Type" class="form-control text-bold">
                        <option selected disabled value="0" class="text-bold bg-danger">Choose Device . . .</option>
                        <option value="Pc" class="text-bold">Pc</option>
                        <option value="Laptop" class="text-bold">Laptop</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="Device_Status" class="col-sm-3 col-form-label text-right">Device Status</label>
                <div class="col-sm-9">
                    <select name="Device_Status" id="Device_Status" class="form-control text-bold  text-center">
                        <option selected disabled value="" class="text-bold bg-danger">Choose Device . . .</option>
                        <option value="On" class="text-bold">On (Berfungsi / Aktif)</option>
                        <option value="Off" class="text-bold">Off (Tidak Berfungsi / Mati)</option>
                        <option value="On Sale" class="text-bold">On Sale (Di Jual)</option>
                        <option value="Combined Components" class="text-bold">Combined Components (Kaninal)</option>
                    </select>
                </div>
            </div>

            <div class="form-group row" id="Choose_User">
                <label for="Choose_User_Device" class="col-sm-3 col-form-label text-right">Device User</label>
                <div class="col-sm-9">
                    <select name="Choose_User_Device" id="Choose_User_Device" class="form-control text-bold  text-center">
                        <option selected disabled value="" class="text-bold bg-danger">Device User</option>
                        <option value="Student" class="text-bold">Student</option>
                        <option value="Management" class="text-bold">Management</option>
                    </select>
                </div>
            </div>

            <div id="Choose_Device_User"></div>

        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="border">
                    <img id="Show-File-Device" class="img-fluid pad" src="" alt="Photo Davice">
                </div>
            </div>
            <div class="custom-file">
                <input name="File-Device" id="File-Device" type="file" class="custom-file-input">
                <label class="custom-file-label" for="File-Device">Choose file</label>
            </div>
        </div>
    </div>
<?php
}
?>