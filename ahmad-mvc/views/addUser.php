<?php include 'layouts/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <h1 class="text-center">Addition User Page</h1>
        <div class="col-md-8 offset-2 mt-5">
            <form action="/ahmad-mvc/public/home/store/" method="GET">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Role</label>
                    <select class="form-select" name="role">
                        <option selected>User Role</option>
                        <option value="super admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="normal">Normal</option>
                    </select>
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

