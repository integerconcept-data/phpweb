<?php require base_path('views/partials/head.php') ?>

	

	
  <?php require base_path('views/partials/nav.php') ?>

  <?php require base_path('views/partials/banner.php')?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      
         <p class="mt-6">
         	<a href="/notes" class="text-blue-500 underline">
         		go back...
         	</a>
         </p>

              <p><?= htmlspecialchars($notes['body']) ?></p>

              <footer class="mt-6">
                <a href="/notes/edit?id=<?= $notes['id'] ?>" class="text-gray-500 border border-current px-3 py-1 rounded">Edit</a>
              </footer>

           <form class="mt-6" method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" value="<?= $notes['id'] ?>" name="id">
             <button class="text-sm text-red-500">Delete</button>
           </form>
      
    </div>
  </main>
<?php require base_path('views/partials/footer.php') ?>