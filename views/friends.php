<div class="container show">
    <div class="col-md-3">
        <?php if(!empty($this->img)){?>
        <img src="/public/uploads/<?=$this->img;?>" class="img-rounded" width="200" height="200">
        <?php } else {?>
            <img src="/public/images/avatar.png" class="img-rounded" width="200" height="200">
        <?php } ?>
    </div>
    <div class="clearfix">
        <h3 class="text-muted"><?=$this->first_name?> <?=$this->last_name?></h3>
        <p class="text-info">E-mail: <?=$this->email?></p>
    </div>
     
    <a href="/account/chat/<?=$this->id?>"><img src="/public/images/sendsms.png" class="img-rounded" width="50" height="50"></a>
    
</div>