<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
     <h2 class="text-lg font-medium mr-auto">
         <?= $title; ?>
     </h2>
     <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
     <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white mr-2">Add New Book</a>
     <a href="javascript:;" data-toggle="modal" data-target="#bcModal" class="button inline-block bg-theme-1 text-white mr-2">Add New Book Category</a>
         <div class="dropdown relative ml-auto sm:ml-0">
             <button class="dropdown-toggle button px-2 box text-gray-700">
                 <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
             </button>
             <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                 <div class="dropdown-box__content box p-2">
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group </a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- BEGIN: Datatable -->
 <div class="intro-y datatable-wrapper box p-5 mt-5">
     <table class="table table-report table-report--bordered display datatable w-full">
         <thead>
             <tr>
                 <th class="border-b-2 whitespace-no-wrap">Book Title</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Writter</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Realeser</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Release Year</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
             </tr>
         </thead>
         <tbody>
            <?php foreach ($books as $book) : ?>
             <tr>
                 <td class="border-b">
                     <div class="font-medium whitespace-no-wrap"><?= $book['title']; ?></div>
                 </td>

                 <td class="text-center border-b"><?= $book['writter'] ?></td>
                 <td class="text-center border-b"><?= $book['penerbit'] ?></td>
                 <td class="text-center border-b"><?= $book['release_year'] ?></td>

                 <td class="border-b w-5">
                     <div class="flex sm:justify-center items-center">
                         <a class="flex items-center mr-3" href=""> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                         <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                     </div>
                 </td>
             </tr>
             <?php endforeach; ?>

         </tbody>
     </table>
 </div>
 <!-- END: Datatable -->

 <!-- BEGIN: Datatable -->
 <div class="intro-y datatable-wrapper box p-5 mt-5">
     <table class="table table-report table-report--bordered display datatable w-full">
         <thead>
             <tr>
                 <th class="border-b-2 whitespace-no-wrap">Book Title</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Category</th>
                 <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
             </tr>
         </thead>
         <tbody>
            <?php foreach ($bc as $b) : ?>
             <tr>
                 <td class="border-b">
                     <div class="font-medium whitespace-no-wrap"><?= $b['title']; ?></div>
                 </td>

                 <td class="text-center border-b"><?= $b['category'] ?></td>

                 <td class="border-b w-5">
                     <div class="flex sm:justify-center items-center">
                         <a class="flex items-center mr-3" href=""> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                         <a class="flex items-center text-theme-6" href="<?= base_url('Books/deleteBc/') . $b['book_category_id'] ?>"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                     </div>
                 </td>
             </tr>
             <?php endforeach; ?>

         </tbody>
     </table>
 </div>
 <!-- END: Datatable -->

 <!-- Add Modal -->
 <div class="modal" id="header-footer-modal-preview">
     <div class="modal__content">
         <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
             <h2 class="font-medium text-base mr-auto">Add Book</h2>
         </div>
         <div class="p-5 gap-4 row-gap-3" >
             <form action="<?= base_url('Books/AddBook') ?>" method="post" enctype="multipart/form-data">
                <label>Title</label>
                <input type="text" name="title" class="input w-full border mt-2" >
                <label>Writter</label>
                <input type="text" name="writter" class="input w-full border mt-2" >
                <label>Realeser</label>
                <input type="text" name="penerbit" class="input w-full border mt-2" >
                <label>Realese Year</label>
                <input type="number" name="realese_year" class="input w-full border mt-2" >
                <label>Poster</label>
                <input type="file" name="poster" class="input w-full border mt-2" >
                <label>PDF File</label>
                <input type="file" name="file" class="input w-full border mt-2" >

            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button> </div>
        </form>
        </div>
 </div>
 <!-- END: Add Modal -->
 <!-- Add BC Modal -->
 <div class="modal" id="bcModal">
     <div class="modal__content">
         <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
             <h2 class="font-medium text-base mr-auto">Add Book Category</h2>
         </div>
         <div class="p-5 gap-4 row-gap-3" >
             <form action="<?= base_url('Books/addBookCategory') ?>" method="post" enctype="multipart/form-data">
                <label>Books</label>
                <select name="book_id" class="input input--sm border mr-2">
                    <?php foreach($books as $book) : ?>
                    <option value="<?= $book['book_id'] ?>"><?= $book['title'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Category</label>
                <select name="category_id" class="input input--sm border mr-2">
                    <?php foreach($categories as $category) : ?>
                    <option value="<?= $category['category_id'] ?>"><?= $category['category'] ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button> </div>
        </form>
        </div>
 </div>
 <!-- END: Add Modal -->