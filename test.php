<form action="pay" class="container" method="post">
    <button class="btn btn-secondary" name="redirect" id="redirect">Thanh toán vnpay</button>
</form>

<div class="invisible-checkboxes" id="date">
    <input type="radio" name="date_class" value="1" id="date1"/>
    <label class="checkbox-alias" for="date1">
        Thứ <br>  2 - 4 - 6
    </label>
    <input type="radio" name="date_class" value="2" id="date2"/>
    <label class="checkbox-alias" for="date2">
        Thứ <br>  3 - 5 - 7
    </label>
</div>

<div class="invisible-checkboxes" id="time">
    <input type="radio" name="rGroup" value="1" id="time1"/>
    <label class="checkbox-alias" for="time1">
        Ca 1 <br> 9h00 - 11h00
    </label>
    <input type="radio" name="rGroup" value="2" id="time2"/>
    <label class="checkbox-alias" for="time2">
        Ca 2 <br> 14h00 - 16h00
    </label>
</div>
<style>
    .invisible-checkboxes {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .checkbox-alias{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border: 3px solid #ccc;
        width: 120px;
        height: 50px;
        z-index: 1;
        position: relative;
        transition: all 250ms ease-out;
        cursor: pointer;
        margin: 20px;
        border-radius: 20px;
    }

    .invisible-checkboxes input[type=radio]{
        display: none;
    }

    .invisible-checkboxes input[type=radio]:checked + .checkbox-alias{
        border: 3px solid green;
        color: green;
    }
</style>