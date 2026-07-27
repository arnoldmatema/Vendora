<?php

session_start();

include 'config/db.php';

/* CHECK IF USER IS LOGGED IN */
if(!isset($_SESSION['user_id'])){
    header("Location: loginpage.php");
    exit();
}

/* ONLY ADMIN CAN ACCESS */
if($_SESSION['role'] != 'admin'){
    echo "Access denied";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Vendora</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="adminstyle.css" />
        <script src="https://kit.fontawesome.com/0b6bbeb682.js" crossorigin="anonymous"></script>
    </head>

    <body>
  
  <!-- ADMIN DASHBOARD -->
  <div class="admin-shell">
 
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-logo">
        <div class="logo-icon">V</div>
        <span class="logo-text">Admin</span>
      </div>
      <nav class="sidebar-nav">
        <button class="nav-item active" onclick="switchTab('users', this)">Users</button>
        <button class="nav-item" onclick="switchTab('listings', this)">Listings</button>
      </nav>
     <button class="sidebar-logout"
onclick="window.location.href='lougout.php'"> Log Out</button>
    </aside>
 
    <!-- MAIN -->
    <main class="admin-main">
 
      <!-- USERS TAB -->
      <div id="tab-users">
        <div class="admin-header">
          <h1 class="admin-title">Users</h1>
          <input class="admin-search" type="text" placeholder="Search users..." oninput="filterUsers(this.value)" />
        </div>
 
        <div class="admin-table-wrap">
          <table class="admin-table" id="usersTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

<?php

$users_query = mysqli_query($conn, "SELECT * FROM users");

while($user = mysqli_fetch_assoc($users_query)){

?>

<tr>

<td>
<strong>
<?php echo $user['first_name'] . " " . $user['last_name']; ?>
</strong>
</td>

<td>
<?php echo $user['email']; ?>
</td>

<td>

<form method="POST" action="update_role.php">

<input type="hidden" name="user_id"
value="<?php echo $user['id']; ?>">

<select name="role" onchange="this.form.submit()">

<option value="buyer"
<?php if($user['role'] == 'buyer') echo 'selected'; ?>>
Buyer
</option>

<option value="seller"
<?php if($user['role'] == 'seller') echo 'selected'; ?>>
Seller
</option>

<option value="admin"
<?php if($user['role'] == 'admin') echo 'selected'; ?>>
Admin
</option>

</select>

</form>

</td>

<td>
<?php echo $user['created_at']; ?>
</td>

<td>

<a href="delete_user.php?id=<?php echo $user['id']; ?>"
onclick="return confirm('Delete this user?')">

<button class="btn-delete">
Delete
</button>

</a>

</td>

</tr>

<?php } ?>

</tbody>
          </table>
        </div>
      </div>
 
      <!-- LISTINGS TAB -->
      <div id="tab-listings" style="display:none">
        <div class="admin-header">
          <h1 class="admin-title">Listings</h1>
          <input class="admin-search" type="text" placeholder="Search listings..." oninput="filterListings(this.value)" />
        </div>
 
        <div class="admin-table-wrap">
          <table class="admin-table" id="listingsTable">
            <thead>
              <tr>
                <th>Item</th>
                <th>Seller</th>
                <th>Category</th>
                <th>Price</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

<?php

$listings_query = mysqli_query($conn, "SELECT * FROM products");

while($listing = mysqli_fetch_assoc($listings_query)){

?>

<tr>

<td>
<strong>
<?php echo $listing['title']; ?>
</strong>
</td>

<td>
<?php echo $listing['seller']; ?>
</td>

<td>
<?php echo $listing['category']; ?>
</td>

<td>
R<?php echo $listing['price']; ?>
</td>

<td>
<?php echo $listing['created_at']; ?>
</td>

<td>

<a href="delete_listing.php?id=<?php echo $listing['id']; ?>"
onclick="return confirm('Delete this listing?')">

<button class="btn-delete">
Delete
</button>

</a>

</td>

</tr>

<?php } ?>

</tbody>
          </table>
        </div>
      </div>
 
    </main>
  </div>
 
  <!-- CONFIRM MODAL -->
  <div class="modal-overlay" id="confirmModal" style="display:none">
    <div class="confirm-box">
      <p class="confirm-msg" id="confirmMsg">Are you sure?</p>
      <div class="confirm-btns">
        <button class="btn-admin-danger" id="confirmYes">Delete</button>
        <button class="btn-admin-outline" onclick="closeConfirm()">Cancel</button>
      </div>
    </div>
  </div>
 
  <script>
    
   document.addEventListener('keydown', e => {
  if (e.key === 'Enter' && document.getElementById('gate').style.display !== 'none') adminLogin();
});
 
    /* ── Tab switching ── */
    function switchTab(name, btn) {
      document.getElementById('tab-users').style.display    = name === 'users'    ? 'block' : 'none';
      document.getElementById('tab-listings').style.display = name === 'listings' ? 'block' : 'none';
      document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
      btn.classList.add('active');
    }
 
    /* ── Render users ── */
    function renderUsers(data) {
      const body = document.getElementById('usersBody');
      body.innerHTML = data.length === 0
        ? '<tr><td colspan="5" class="empty-row">No users found</td></tr>'
        : data.map(u => `
          <tr id="user-row-${u.id}">
            <td><strong>${u.name}</strong></td>
            <td>${u.email}</td>
            <td>
              <select class="role-select role-${u.role}" onchange="changeRole(${u.id}, this)">
                <option value="buyer"  ${u.role==='buyer'  ? 'selected':''}>Buyer</option>
                <option value="seller" ${u.role==='seller' ? 'selected':''}>Seller</option>
                <option value="admin"  ${u.role==='admin'  ? 'selected':''}>Admin</option>
              </select>
            </td>
            <td>${u.joined}</td>
            <td>
              <button class="btn-delete" onclick="confirmDelete('user', ${u.id})">Delete</button>
            </td>
          </tr>`).join('');
    }
 
    /* ── Render listings ── */
    function renderListings(data) {
      const body = document.getElementById('listingsBody');
      body.innerHTML = data.length === 0
        ? '<tr><td colspan="6" class="empty-row">No listings found</td></tr>'
        : data.map(l => `
          <tr id="listing-row-${l.id}">
            <td><strong>${l.title}</strong></td>
            <td>${l.seller}</td>
            <td>${l.category}</td>
            <td>${l.price}</td>
            <td>${l.date}</td>
            <td>
              <button class="btn-delete" onclick="confirmDelete('listing', ${l.id})">Delete</button>
            </td>
          </tr>`).join('');
    }
 
    /* ── Role change ── */
    function changeRole(id, sel) {
      const u = users.find(u => u.id === id);
      u.role = sel.value;
      sel.className = `role-select role-${u.role}`;
    }
 
    /* ── Filter ── */
    function filterUsers(q) {
      const filtered = users.filter(u =>
        u.name.toLowerCase().includes(q.toLowerCase()) ||
        u.email.toLowerCase().includes(q.toLowerCase())
      );
      renderUsers(filtered);
    }
 
    function filterListings(q) {
      const filtered = listings.filter(l =>
        l.title.toLowerCase().includes(q.toLowerCase()) ||
        l.seller.toLowerCase().includes(q.toLowerCase())
      );
      renderListings(filtered);
    }
 
    /* ── Confirm delete ── */
    let pendingDelete = null;
 
    function confirmDelete(type, id) {
      pendingDelete = { type, id };
      document.getElementById('confirmMsg').textContent =
        `Delete this ${type}? This cannot be undone.`;
      document.getElementById('confirmModal').style.display = 'flex';
      document.getElementById('confirmYes').onclick = executeDelete;
    }
 
    function executeDelete() {
      const { type, id } = pendingDelete;
      if (type === 'user')    { users    = users.filter(u => u.id !== id);    renderUsers(users); }
      if (type === 'listing') { listings = listings.filter(l => l.id !== id); renderListings(listings); }
      closeConfirm();
    }
 
    function closeConfirm() {
      document.getElementById('confirmModal').style.display = 'none';
      pendingDelete = null;
    }
 
    // Allow Enter key on login
    document.addEventListener('keydown', e => {
      if (e.key === 'Enter' && document.getElementById('gate').style.display !== 'none') adminLogin();
    });
  </script>
 
</body>
</html>