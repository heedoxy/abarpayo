<? require_once "functions/database.php";
$database = new DB();
$connection = $database->connect();
$action = new Action();

// ----------- urls ----------------------------------------------------------------------------------------------------
// main url for add , edit
$main_url = "product.php";
// main url for remove , change status
$list_url = "product-list.php";
// ----------- urls ----------------------------------------------------------------------------------------------------

// ----------- get data from database when action is edit --------------------------------------------------------------
$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $id = $action->request('edit');
    $row = $action->product_get($id);
}
// ----------- get data from database when action is edit --------------------------------------------------------------

// ----------- check error ---------------------------------------------------------------------------------------------
$error = false;
if (isset($_SESSION['error'])) {
    $error = true;
    $error_val = $_SESSION['error'];
    unset($_SESSION['error']);
}
// ----------- check error ---------------------------------------------------------------------------------------------

// ----------- add or edit ---------------------------------------------------------------------------------------------
if (isset($_POST['submit'])) {

    // get fields
    $category_id = $action->request('category_id');
    $shop_id = $action->request('shop_id');
    $title = $action->request('title');
    $image = $action->request('icon');
    $description = $action->request('description');
    $price = $action->request('price');
    $status = $action->request('status');
    $discount = $action->request('discount');
    $discount1 = $action->request('discount1');
    $discount2 = $action->request('discount2');
    $discount3 = $action->request('discount3');
    $discount4 = $action->request('discount4');
    $score = $action->request('score');

    if($_FILES["icon"]["name"]){
        unlink("images/products/$icon");
        $target_dir = "images/products/";
        $target_file = $target_dir . basename($_FILES["icon"]["name"]);


        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            $name = $action -> get_token(10) . "." . $imageFileType;
            // Upload file
            move_uploaded_file($_FILES['icon']['tmp_name'],$target_dir.$name);
            $icon = $name;
        } 
    }

    // send query
    if ($edit) {
        $command = $action->product_edit($id,$category_id,$shop_id,$title,$icon,$description,$price,$discount,$discount1,$discount2,$discount3,$discount4,$score,$status);
    } else {
        $command = $action->product_add($category_id,$shop_id,$title,$icon,$description,$price,$discount,$discount1,$discount2,$discount3,$discount4,$score,$status);
    }

    // check errors
    if ($command) {
        $_SESSION['error'] = 0;
    } else {
        $_SESSION['error'] = 1;
    }

    // bye bye :)
    header("Location: $main_url?edit=$command");

}
// ----------- add or edit ---------------------------------------------------------------------------------------------

// ----------- start html :) ------------------------------------------------------------------------------------------
include('header.php'); ?>

<div class="page-wrapper">

    <div class="row page-titles">

        <!-- ----------- start title --------------------------------------------------------------------------- -->
        <div class="col-md-12 align-self-center text-right">
            <?php if (!isset($_GET['action'])) { ?>
                <h3 class="text-primary">ثبت محصول </h3>
            <?php } else { ?>
                <h3 class="text-primary">ویرایش محصول </h3>
            <?php } ?>
        </div>
        <!-- ----------- end title ----------------------------------------------------------------------------- -->

        <!-- ----------- start breadcrumb ---------------------------------------------------------------------- -->
        <div class="col-md-12 align-self-center text-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="panel.php">
                        <i class="fa fa-dashboard"></i>
                        خانه
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="<?= $list_url ?>">محصولات</a></li>
                <?php if ($edit) { ?>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">ثبت</a></li>
                <?php } else { ?>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">ویرایش</a></li>
                <?php } ?>
            </ol>
        </div>
        <!-- ----------- end breadcrumb ------------------------------------------------------------------------ -->

    </div>

    <!-- ----------- start main container ---------------------------------------------------------------------- -->
    <div class="container-fluid">

        <!-- ----------- start error list ---------------------------------------------------------------------- -->
        <? if ($error) {
            if ($error_val) { ?>
                <div class="alert alert-danger">
                    عملیات ناموفق بود .
                </div>
            <? } else { ?>
                <div class="alert alert-info text-right">
                    عملیات موفق بود .
                </div>
            <? }
        } ?>
        <!-- ----------- end error list ------------------------------------------------------------------------ -->

        <div class="row">
            <div class="col-lg-6">

                <!-- ----------- start history ----------------------------------------------------------------- -->
                <? if ($edit) { ?>
                    <div class="row m-b-0">
                        <div class="col-lg-6">
                            <p class="text-right m-b-0">
                                تاریخ ثبت :
                                <?= $action->time_to_shamsi($row->created_at) ?>
                            </p>
                        </div>
                        <? if ($row->updated_at) { ?>
                            <div class="col-lg-6">
                                <p class="text-right m-b-0">
                                    آخرین ویرایش :
                                    <?= $action->time_to_shamsi($row->updated_at) ?>
                                </p>
                            </div>
                        <? } ?>
                    </div>
                <? } ?>
                <!-- ----------- end history ------------------------------------------------------------------- -->

                <!-- ----------- start row of fields ----------------------------------------------------------- -->
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                    <select class="form-control select2" name="category_id" required>
                                        <option>دسته بندی را انتخاب فرمایید .</option>
                                        <?
                                        $option_result = $action->category_list();
                                        while ($option = $option_result->fetch_object()) {
                                            echo '<option value="';
                                            echo $option->id;
                                            echo '"';
                                            if ($option->id == $row->category_id) echo "selected";
                                            echo '>';
                                            echo $option->title;
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select2" name="shop_id" required>
                                        <option> فروشگاه را انتخاب فرمایید .</option>
                                        <?
                                        $option_result = $action->shop_list();
                                        while ($option = $option_result->fetch_object()) {
                                            echo '<option value="';
                                            echo $option->id;
                                            echo '"';
                                            if ($option->id == $row->shop_id) echo "selected";
                                            echo '>';
                                            echo $option->title;
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                          
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control input-default "
                                           placeholder="عنوان"
                                           value="<?= ($edit) ? $row->title : "" ?>" required>
                                </div>

                                <div class="form-group">
                                    <textarea type="text" name="description" class="form-control input-default "
                                           placeholder="توضیحات"
                                            ><?= ($edit) ? $row->discription : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="price" class="form-control input-default "
                                           placeholder="قیمت"
                                           value="<?= ($edit) ? $row->price : "" ?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discount" class="form-control input-default "
                                           placeholder="تخفیف کاربران"
                                           value="<?= ($edit) ? $row->discount : "" ?>" >
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discount1" class="form-control input-default "
                                           placeholder="تخفیف بازارساز سطح یک"
                                           value="<?= ($edit) ? $row->discount1 : "" ?>" >
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discount2" class="form-control input-default "
                                           placeholder="تخفیف بازارساز سطح دو"
                                           value="<?= ($edit) ? $row->discount2 : "" ?>" >
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discount3" class="form-control input-default "
                                           placeholder="تخفیف بازارساز سطح سه"
                                           value="<?= ($edit) ? $row->discount3 : "" ?>" >
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discount4" class="form-control input-default "
                                           placeholder="تخفیف بازاساز سطح چهار"
                                           value="<?= ($edit) ? $row->discount4 : "" ?>" >
                                </div>

                                <div class="form-group">
                                    <input type="text" name="score" class="form-control input-default "
                                           placeholder="امتیاز"
                                           value="<?= ($edit) ? $row->score : "" ?>" >
                                </div>

                                <div>
                                    <label for="icon" class="btn btn-dark btn-block m-0">انتخاب عکس محصول</label>
                                    <input type="file" name="icon" id="icon" style="visibility:hidden;">
                                </div>
                                
                                <div class="form-actions">

                                    <label class="float-right">
                                        <input type="checkbox" class="float-right m-1" name="status" value="1"
                                            <? if ($edit && $row->status) echo "checked"; ?> >
                                        فعال
                                    </label>

                                    <button type="submit" name="submit" class="btn btn-success sweet-success">
                                        <i class="fa fa-check"></i> ثبت
                                    </button>

                                    <a href="<?= $list_url ?>"><span name="back" class="btn btn-inverse">بازگشت به لیست</span></a>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- ----------- end row of fields ----------------------------------------------------------- -->

            </div>
            <? if($edit && $row->image) { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <img src="images/products/<?= $row->image ?>">
                        </div>
                    </div>
            <? } ?>
        </div>
    </div>
    <!-- ----------- end main container ------------------------------------------------------------------------ -->

</div>
<? include('footer.php'); ?>
// ----------- end html :) ---------------------------------------------------------------------------------------------

