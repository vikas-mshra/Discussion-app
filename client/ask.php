<div class="container">
    <h1 class="heading">Ask a Question</h1>
    <form method="POST" action="./server/requests.php">
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter title">
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" aria-describedby="description" placeholder="Enter description"> </textarea>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="category" class="form-label">Category</label>
            <?php include('./client/category.php'); ?>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
        </div>
    </form>
</div>