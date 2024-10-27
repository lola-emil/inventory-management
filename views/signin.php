<?php 

// Check if naka login na d ay ang user
if (isset($_SESSION["ADMIN_ID"])) {
    header("Location: ".PROJECT_FOLDER."/");
    return;
}

require_once "controllers/signin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    signin();
    return;
}

$username = "";
$password = "";

if (isset($_SESSION["fields"])) {
    $username = $_SESSION["fields"]["username"];
    $password = $_SESSION["fields"]["password"];
}

?>

<div class="h-screen w-full flex justify-center items-center ">
    <form action="<?= PROJECT_FOLDER ?>/signin" method="post" class="w-[320px]">
        <h3 class="font-semibold text-3xl text-center">Admin Login</h3>
        <?php if (isset($_SESSION["error"])) {?>
        <div role="alert" class="alert alert-error mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= $_SESSION["error"] ?></span>
        </div>
        <?php } ?>
        <label class="form-control w-full mt-5">
        <div class="label">
            <span class="label-text">Username</span>
        </div>
        <input type="text" name="username" class="input input-bordered w-full max-w-xs" 
        value="<?= $username ?>"/>
        </label>

        <label class="form-control w-full mt-5">
        <div class="label">
            <span class="label-text">Password</span>
        </div>
        <input type="password" name="password" class="input input-bordered w-full max-w-xs" 
        value="<?= $password ?>" />
        </label>

        <input type="submit" value="Sign In" class="btn btn-primary mt-5 w-full max-w-xs">
    </form>
</div>


<?php
    // Delete temporary sessions
    unset($_SESSION["error"]);
    unset($_SESSION["fields"]);
?>