<div class="container">
    <h1 class="heading">Sign Up</h1>
    <form method="POST" action="./server/requests.php">
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="Enter username">
        </div>
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter user email">
        </div>
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Enter user password">
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" aria-describedby="address" placeholder="Enter user address">
        </div>
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <button type="submit" name="signup" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>