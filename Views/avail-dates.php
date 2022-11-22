
<div class="form">
<form action="<?php echo FRONT_ROOT ."User/filterDateKeep_Size"?>">

<script>
        function validate() {
            if (document.getElementById('availabilityEnd').value < document.getElementById('availabilityStart').value)
                document.getElementById('availabilityEnd').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
            else
                document.getElementById('availabilityEnd').setCustomValidity('');
        }
    </script>
    <div class="d-flex justify-content-center p-2 ">
    <div class="form-outline w-50 m-5 p-3">
        <label for="InitDate">Initial date:</label>
        <input type="date" id="InitDate" class="form-control" name="initDate" min="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div>
        <div>
            <label for="size">Size</label>
            <select name="size" id="size">
                <option value="1">Small</option>
                <option value="2">Medium</option>
                <option value="3">Large</option>
            </select>
        </div>
    </div>
    
    <br>
    <div class="form-outline w-50 m-5 p-3">
        <label for="EndDate">End date:</label>
        <input type="date" id="EndDate" class="form-control" name="endDate" title="La fecha inicial debe ser menor que la fecha final" oninput="validate()" required>
    </div>
    
    </div>

    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Filter</button>
    </div>


</form>
</div>