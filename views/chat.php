
    <div class="container">
    <div id="mess_content" class="col-md-4" style="border:1px solid silver;height: 300px;overflow-y: scroll;">
        <?php foreach ($this->messages as $value){?>
        <b><?=$value['f_name']." ".$value['l_name']?></b>
        <i><small><?=$value['date']?></small></i>
        <p><?=$value['text']?></p>
        <?php $last_date=$value['date'] ?>
        <?php }?>
    </div>
    </div>
    <script>
        var last_date="<?=isset($last_date) ? $last_date:0 ?>";
    </script>

<div class="container">
<div class="col-md-4">
    <textarea id="message" style="width: 100%;"></textarea>

    <button type="button" id="send" style="width: 100%;" class="btn btn-info">Send</button>
    </div>
</div>