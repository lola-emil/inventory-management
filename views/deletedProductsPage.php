<?php
if (!isset($_SESSION["ADMIN_ID"]))
  header("Location: /signin");

require_once "dal/product.php";
require_once "utils/pagination-util.php";
require_once "utils/url-util.php";

$cols = ["Product Name", "Price", "Deleted Date", "Deleted By"];

if (isset($_GET["q"]))
    $result = searchDeletedProduct($_GET["q"]);
else
    $result = getAllDeletedProducts();

$pageNumber = 1;

if (isset($_GET["page"]) && filter_var($_GET["page"], FILTER_VALIDATE_INT))
    $pageNumber = $_GET["page"];

$products = paginate($result, $pageNumber);

require_once "fragments/navbar.php";
?>


<br>
<div class="container mx-auto">
    <h1 class="text-4xl">Deleted Products</h1>
<br>
    <div class="w-full flex">
        <form action="" class="flex items-center flex-1">
            <input type="text" name="q" 
            class="input input-bordered w-full max-w-sm"
            placeholder="Type search term"
            value="<?= $_GET["q"] ?? "" ?>">
            
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div>
        </div>
    </div>

    <?php if (count($products) < 1){ ?>
        <div class="text-center h-96 flex items-center justify-center">
            <p class="text-xl">
                <?php if (isset($_GET["q"]) && !empty(trim($_GET["q"]))) {?>
                    No result for '<?= $_GET["q"] ?>'
                <?php } else { ?>
                    There's nothing to show at the moment
                <?php } ?>
            </p>
        </div>
    <?php } else { ?>
        <table class="table table-zebra">
        <thead>
        <tr>
            <?php foreach ($cols as $col) {?>
            <th><?= $col ?></th>
            <?php }?>
            <th></th>

        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i];    
            ?>
            <tr>
                <td><?= $product["name"] ?></td>
                <td>Php <?= $product["price"] ?></td>
                <td><?= $product["deleted_date"] ?? "N/A" ?></td>
                <td><?= $product["deleted_by"] ?? "N/A" ?></td>
                <td>
                    <button class="text-primary underline" onclick="<?="restore_modal_".$i?>.showModal()">Restore</button>
                    <dialog id="<?= "restore_modal_".$i ?>" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Warning</h3>
                            <p class="py-4">Are you sure you want to restore this product?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Cancel</button>
                                    <a href="<?= PROJECT_FOLDER ?>/restore-product?id=<?= $product["product_id"] ?>" class="btn btn-primary">Confirm</a>
                                </form>
                            </div>
                        </div>
                    </dialog>

                    <button class="text-error underline" onclick="<?="delete_modal_".$i?>.showModal()">Delete</button>
                    <dialog id="<?= "delete_modal_".$i ?>" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Warning</h3>
                            <p class="py-4">Are you sure you want to delete this product? <br> 
                            <span class="text-error font-bold">(This will delete the product FOREVER; this action is IRREVERSIBLE)</span></p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Cancel</button>
                                    <a href="<?= PROJECT_FOLDER ?>/hard-delete-product?id=<?= $product["product_id"] ?>" class="btn btn-primary">Confirm</a>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>


    <br>
    <div class="w-full flex justify-center">
    <div class="join">
        <a href="<?= updateQueryParams($_SERVER["REQUEST_URI"], ["page" => $pageNumber - 1 ]) ?>" 
        class="join-item btn <?= $pageNumber == 1 ? "btn-disabled" : "" ?>">«</button>
        <?php for ($i = 1; $i <= countPages(count($result)); $i++) {?>
            <?php if ($i == $pageNumber) {?>
            <a href="<?= updateQueryParams($_SERVER["REQUEST_URI"], ["page" => $i ]) ?>" class="join-item btn btn-active"><?= $i ?></a>
            <?php } else {?>
            <a href="<?= updateQueryParams($_SERVER["REQUEST_URI"], ["page" => $i ]) ?>" class="join-item btn"><?= $i ?></a>
            <?php }?>
        <?php }?>
        <a href="<?= updateQueryParams($_SERVER["REQUEST_URI"], ["page" => $pageNumber + 1 ]) ?>" 
        class="join-item btn <?= $pageNumber == countPages(count($result)) ? "btn-disabled" : "" ?>">»</a>
    </div>
    </div>
  </div>    
  <br>
  <br>
  <?php } ?>


<div class="toast toast-top toast-start">
  <?php if (isset($_SESSION["message"])){?>
    <div class="alert alert-success">
        <span><?= $_SESSION["message"] ?></span>
    </div>
    <?php }?>
</div>

<?php
    // Unset temporary sessions
    unset($_SESSION["message"]);
?>