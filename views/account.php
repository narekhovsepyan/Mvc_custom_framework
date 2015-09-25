<div class="container show">
    <div class="col-md-3">
        <?php if(!empty($this->img)){?>
        <img src="../public/uploads/<?=$this->img;?>" class="img-rounded" width="200" height="200">
        <?php } else {?>
            <img src="../public/images/avatar.png" class="img-rounded" width="200" height="200">
        <?php } ?>
        <form method="post" action="" enctype="multipart/form-data">   
            <div class="form-group">
                <label for="exampleInputFile">Upload a new photo </label>
                <input type="file" name="file" value="Choose image" id="exampleInputFile">
            </div>
            <button type="submit" name="upload" class="btn btn-default">Upload</button>
            <p class="text-warning"><?=$this->error;?></p>
        </form>
    </div>
    <div class="col-md-2">
        <h3 class="text-muted"><?=$this->first_name?> <?=$this->last_name?></h3>
        <p class="text-info">E-mail: <?=$this->email?></p>
    </div>
</div>
<div class="container">
<h3 class="text-info">My Friends</h3>
<?php foreach ($this->friends as $value){?>
    <div class="clearfix">
    <?php if(!empty($value['avatar'])){?>
        <img src="../public/uploads/<?=$value['avatar'];?>" class="img-rounded" width="100" height="100">
    <?php } else {?>
            <img src="../public/images/avatar.png" class="img-rounded" width="100" height="100">
    <?php } ?>
    
        <a href="/account/friends/<?=$value['id']?>" class="text-muted"><?=$value['f_name']?> <?=$value['l_name']?></a>
    </div>   
<?php }; ?>
    </div>