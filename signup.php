<?
require_once "functions/database.php";
require_once "const-values.php";
if(!isset($_SESSION['fromValidation'])){
    header("Location: phone.php");
}
$action = new Action();
?>
<?
    if(isset($_POST['submit'])){
        unset($_SESSION['fromValidation']);
        $first_name = $action->request('first_name');
        $last_name = $action->request('last_name');
        $reference_code = $action->request('reference_code');
        if($reference_code){
            $result = $action->user_reference_code($reference_code);
            $reference = $result->fetch_object();
            $reference_id = $reference->id;
            $action->score_log_add($reference_id,$invitation_score,$invitation_action,1);
            $action->score_edit($reference_id,$invitation_score,1);
        } 
        $phone = $_SESSION['phone'];
        $platform = 1;
        $command = $action->user_add($first_name,$last_name,$phone,$reference_id,$platform);    
        if($command){
            $action->score_log_add($command,$register_score,$register_action,1);
            $action->score_edit($command,$register_score,1);
            unset($_SESSION['phone']);
            $_SESSION['user_id'] = $command;
            header("Location: index.php");
        }else{
            ?>
          <div class="modal">
                    <div class="alert alert-fail">
                        <span class="close_alart">×</span>
                        <p>
                              ثبت نام ناموفق بود!
                        </p>
                    </div>
           </div>
            <script src="assets/js/alert.js"></script>
           <?
        }
    }
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>ابرپایو</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/fontiran.css">
    <link rel="stylesheet" href="assets/css/fontAswome.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src='assets/js/swiper.js'></script>
    <script src='../assets/js/jquery.js'></script>
    <script src='assets/js/fontAwsome.js'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
</head>
<body>
<div class="background_page">
    <div class="container">
        <div class="center_form">
            <div class="row">
                <div class="col-md-5 right-form">
                    <div class="form_top">
                    <a href="index.php">
                    <img src="assets/images/logo.png">
                    </a>
                        <h4>ثبت نام در ابرپایو</h4>
                    </div>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input type="text" name="first_name" placeholder="فقط حروف فارسی" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text" name="last_name" placeholder="فقط حروف فارسی" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="reference_code">کد معرف(اختیاری)</label>
                            <input type="text" name="reference_code">
                        </div>
                        <input name="submit" type="submit" class="main_btn" value="ادامه">

                    </form>
                </div>
                <div class="col-md-7 left-form">
                    <img src="assets/images/Group 380@2x.png">
                </div>
            </div>
            <p>با ورود یا ثبت نام در ابرپایو <a href="rules.php">شرایط و قوانین </a> را میپذیرید.</p>
        </div>
    </div>
</div>
</body>
</html>