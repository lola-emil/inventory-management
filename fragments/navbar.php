<?php
  require_once "dal/admin.php";

  $adminId = $_SESSION["ADMIN_ID"];
  $matchedUser = getAdminById($adminId);
?>

<div class="navbar bg-base-100">
  <div class="flex-1">
    <p class="text-xl font-semibold">Hello, <?= $matchedUser["firstname"]." ".$matchedUser["lastname"] ?></p>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="<?= PROJECT_FOLDER ?>/">Products</a></li>
      <li><a href="<?= PROJECT_FOLDER ?>/deleted-products">Deleted Products</a></li>

      <li class="ml-12">
        <button  onclick="<?="logout_modal"?>.showModal()">Sign Out</button>
</li>
    </ul>
  </div>
</div>

<dialog id="logout_modal" class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Warning</h3>
      <p class="py-4">Are you sure you want to Sign Out?</p>
      <div class="modal-action">
          <form method="dialog">
              <!-- if there is a button in form, it will close the modal -->
              <button class="btn">Cancel</button>
              <a href="<?= PROJECT_FOLDER ?>/signout" class="btn btn-primary">Sign Out</a>
          </form>
      </div>
    </div>
</dialog>