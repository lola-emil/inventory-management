<?php
if (!isset($_SESSION["ADMIN_ID"]))
  header("Location: /signin");


require_once "controllers/updateproduct.php";
require_once "dal/product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    updateProduct();
    return;
}

if (!isset($_GET["id"])) {
    header("Location: ".PROJECT_FOLDER."/");
    return;
}

$productId = $_GET["id"];
$matchedProduct = getProductById($productId);

$name = $matchedProduct["name"];
$qty = $matchedProduct["qty"];
$price = $matchedProduct["price"];

if (isset($_SESSION["fields"])) {
    $name = $_SESSION["fields"]["name"];
    $qty = $_SESSION["fields"]["qty"];
    $price = $_SESSION["fields"]["price"];
}

require_once "fragments/navbar.php";
?>

<div class="h-screen w-full flex justify-center items-center ">
    <form action="<?= PROJECT_FOLDER ?>/update-product?id=<?= $productId ?>" method="post" class="w-[320px]">
        <h3 class="font-semibold text-3xl text-center">Update Product</h3>
        <?php if (isset($_SESSION["error"])) {?>
        <div role="alert" class="alert alert-error mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= $_SESSION["error"] ?></span>
        </div>
        <?php } ?>
        <label class="form-control w-full mt-5">
        <div class="label">
            <span class="label-text">Name</span>
        </div>
        <input type="text" name="name" class="input input-bordered w-full max-w-xs" 
        value="<?= $name ?>"/>
        </label>

        <label class="form-control w-full mt-5">
        <div class="label">
            <span class="label-text">Qty</span>
        </div>
        <input type="number" name="qty" class="input input-bordered w-full max-w-xs" 
        value="<?= $qty ?>"
        />
        </label>

        <label class="form-control w-full mt-5">
        <div class="label">
            <span class="label-text">Price</span>
        </div>
        <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs" 
        value="<?= $price ?>"
        />

        </label>

        <input type="submit" value="Submit" class="btn btn-primary mt-5 w-full max-w-xs">
    </form>
</div>
<?php
    // Delete temporary sessions
    unset($_SESSION["error"]);
    unset($_SESSION["fields"]);
?>