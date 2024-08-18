<main>
<div class="container">
<div class="row">
<div class="col">
<div class="page-title-container">
<div class="row">
<div class="col-12 col-md-7">
<h1 class="mb-0 pb-0 display-4" id="title">Daftar User</h1>
<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
<ul class="breadcrumb pt-0">
<li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
<li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
<li class="breadcrumb-item"><a href="Interface.Plugins.html">Plugins</a></li>
<li class="breadcrumb-item"><a href="Interface.Plugins.Datatables.html">Datatables</a></li>
</ul>
</nav>
</div>
<div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
<button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
<i data-cs-icon="plus"></i>
<span>Add New</span>
</button>
<div class="btn-group ms-1 check-all-container">
<div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
<span class="form-check float-end">
<input type="checkbox" class="form-check-input" id="datatableCheckAll">
</span>
</div>
<button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu></button>
<div class="dropdown-menu dropdown-menu-end">
<div class="dropdown dropstart dropdown-submenu">
<button class="dropdown-item dropdown-toggle tag-datatable caret-absolute disabled" type="button">Tag</button>
<div class="dropdown-menu">
<button class="dropdown-item tag-done" type="button">Done</button>
<button class="dropdown-item tag-new" type="button">New</button>
<button class="dropdown-item tag-sale" type="button">Sale</button>
</div>
</div>
<div class="dropdown-divider"></div>
<button class="dropdown-item disabled delete-datatable" type="button">Delete</button>
</div>
</div>
</div>
</div>
</div>
<div class="data-table-rows slim">
<div class="row">
<div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
<div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
<input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows">
<span class="search-magnifier-icon">
<i data-cs-icon="search"></i>
</span>
<span class="search-delete-icon d-none">
<i data-cs-icon="close"></i>
</span>
</div>
</div>
<div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
<div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
<button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" type="button" data-bs-delay="0">
<i data-cs-icon="plus"></i>
</button>
<button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button" data-bs-delay="0">
<i data-cs-icon="edit"></i>
</button>
<button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button" data-bs-delay="0">
<i data-cs-icon="bin"></i>
</button>
</div>
<div class="d-inline-block">
<button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-datatable="#datatableRows" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Print" type="button">
<i data-cs-icon="print"></i>
</button>
<div class="d-inline-block datatable-export" data-datatable="#datatableRows">
<button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
<span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
<i data-cs-icon="download"></i>
</span>
</button>
<div class="dropdown-menu shadow dropdown-menu-end">
<button class="dropdown-item export-copy" type="button">Copy</button>
<button class="dropdown-item export-excel" type="button">Excel</button>
<button class="dropdown-item export-cvs" type="button">Cvs</button>
</div>
</div>
<div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childselector="span">
<button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
<span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Item Count">
10 Items
</span>
</button>
<div class="dropdown-menu shadow dropdown-menu-end">
<a class="dropdown-item" href="#">5 Items</a>
<a class="dropdown-item active" href="#">10 Items</a>
<a class="dropdown-item" href="#">20 Items</a>
</div>
</div>
</div>
</div>
</div>
<div class="data-table-responsive-wrapper">
<table id="datatableRows" class="data-table nowrap hover">
<thead>
<tr>
<th class="text-muted text-small text-uppercase">Name</th>
<th class="text-muted text-small text-uppercase">Sales</th>
<th class="text-muted text-small text-uppercase">Stock</th>
<th class="text-muted text-small text-uppercase">Category</th>
<th class="text-muted text-small text-uppercase">Tag</th>
<th class="empty">&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
<td>Basler Brot</td>
<td>213</td>
<td>15</td>
<td>Sourdough</td>
<td>New</td>
<td></td>
</tr>
<tr>
<td>Bauernbrot</td>
<td>633</td>
<td>97</td>
<td>Multigrain</td>
<td>Done</td>
<td></td>
</tr>
<tr>
<td>Kommissbrot</td>
<td>2321</td>
<td>154</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Lye Roll</td>
<td>973</td>
<td>39</td>
<td>Sourdough</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Panettone</td>
<td>563</td>
<td>72</td>
<td>Sourdough</td>
<td>Done</td>
<td></td>
</tr>
<tr>
<td>Saffron Bun</td>
<td>98</td>
<td>7</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Ruisreikäleipä</td>
<td>459</td>
<td>90</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Rúgbrauð</td>
<td>802</td>
<td>234</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Yeast Karavai</td>
<td>345</td>
<td>22</td>
<td>Multigrain</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Brioche</td>
<td>334</td>
<td>45</td>
<td>Sourdough</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Pullman Loaf</td>
<td>456</td>
<td>23</td>
<td>Multigrain</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Soda Bread</td>
<td>1152</td>
<td>84</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Barmbrack</td>
<td>854</td>
<td>13</td>
<td>Sourdough</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Buccellato di Lucca</td>
<td>1298</td>
<td>212</td>
<td>Multigrain</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Toast Bread</td>
<td>2156</td>
<td>732</td>
<td>Multigrain</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Cheesymite Scroll</td>
<td>452</td>
<td>24</td>
<td>Sourdough</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Baguette</td>
<td>456</td>
<td>33</td>
<td>Sourdough</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Guernsey Gâche</td>
<td>1958</td>
<td>221</td>
<td>Multigrain</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Bazlama</td>
<td>858</td>
<td>34</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Bolillo</td>
<td>333</td>
<td>24</td>
<td>Whole Wheat</td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="modal modal-right fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalTitle">Add New</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form>
<div class="mb-3">
<label class="form-label">Name</label>
<input name="Name" type="text" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Sales</label>
<input name="Sales" type="number" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Stock</label>
<input name="Stock" type="number" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Category</label>
<div class="form-check">
<input type="radio" id="category1" name="Category" value="Whole Wheat" class="form-check-input">
<label class="form-check-label" for="category1">Whole Wheat</label>
</div>
<div class="form-check">
<input type="radio" id="category2" name="Category" value="Sourdough" class="form-check-input">
<label class="form-check-label" for="category2">Sourdough</label>
</div>
<div class="form-check">
<input type="radio" id="category3" name="Category" value="Multigrain" class="form-check-input">
<label class="form-check-label" for="category3">Multigrain</label>
</div>
</div>
<div class="mb-3">
<label class="form-label">Tag</label>
<div class="form-check">
<input type="radio" id="tag1" name="Tag" value="New" class="form-check-input">
<label class="form-check-label" for="tag1">New</label>
</div>
<div class="form-check">
<input type="radio" id="tag2" name="Tag" value="Sale" class="form-check-input">
<label class="form-check-label" for="tag2">Sale</label>
</div>
<div class="form-check">
<input type="radio" id="tag3" name="Tag" value="Done" class="form-check-input">
<label class="form-check-label" for="tag3">Done</label>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="addEditConfirmButton">Add</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<footer>
<div class="footer-content">
<div class="container">
<div class="row">
<div class="col-12 col-sm-6">
<p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
</div>
<div class="col-sm-6 d-none d-sm-block">
<ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
<li class="breadcrumb-item mb-0 text-medium">
<a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
</li>
<li class="breadcrumb-item mb-0 text-medium">
<a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
</li>
<li class="breadcrumb-item mb-0 text-medium"><a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>
</div>
<div class="modal fade modal-right scroll-out-negative" id="settings" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="settings" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable full" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Theme Settings</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="scroll-track-visible">
<div class="mb-5" id="color">
<label class="mb-3 d-inline-block form-label">Color</label>
<div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
<a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="blue-light"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT BLUE</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="blue-dark"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK BLUE</span>
</div>
</a>
</div>
<div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
<a href="#" class="flex-grow-1 w-50 option col" data-value="light-red" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="red-light"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT RED</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="red-dark"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK RED</span>
</div>
</a>
</div>
<div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
<a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="green-light"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT GREEN</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="green-dark"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK GREEN</span>
</div>
</a>
</div>
<div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
<a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="purple-light"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT PURPLE</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="purple-dark"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK PURPLE</span>
</div>
</a>
</div>
<div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
<a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="pink-light"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT PINK</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink" data-parent="color">
<div class="card rounded-md p-3 mb-1 no-shadow color">
<div class="pink-dark"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK PINK</span>
</div>
</a>
</div>
</div>
<div class="mb-5" id="navcolor">
<label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
<div class="row d-flex g-3 justify-content-between flex-wrap">
<a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DEFAULT</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-secondary figure-light top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">LIGHT</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-muted figure-dark top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">DARK</span>
</div>
</a>
</div>
</div>
<div class="mb-5" id="placement">
<label class="mb-3 d-inline-block form-label">Menu Placement</label>
<div class="row d-flex g-3 justify-content-between flex-wrap">
<a href="#" class="flex-grow-1 w-50 option col" data-value="horizontal" data-parent="placement">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">HORIZONTAL</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="vertical" data-parent="placement">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary left"></div>
<div class="figure figure-secondary right"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">VERTICAL</span>
</div>
</a>
</div>
</div>
<div class="mb-5" id="behaviour">
<label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
<div class="row d-flex g-3 justify-content-between flex-wrap">
<a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary left large"></div>
<div class="figure figure-secondary right small"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">PINNED</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary left"></div>
<div class="figure figure-secondary right"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">UNPINNED</span>
</div>
</a>
</div>
</div>
<div class="mb-5" id="layout">
<label class="mb-3 d-inline-block form-label">Layout</label>
<div class="row d-flex g-3 justify-content-between flex-wrap">
<a href="#" class="flex-grow-1 w-50 option col" data-value="fluid" data-parent="layout">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">FLUID</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-50 option col" data-value="boxed" data-parent="layout">
<div class="card rounded-md p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom small"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">BOXED</span>
</div>
</a>
</div>
</div>
<div class="mb-5" id="radius">
<label class="mb-3 d-inline-block form-label">Radius</label>
<div class="row d-flex g-3 justify-content-between flex-wrap">
<a href="#" class="flex-grow-1 w-33 option col" data-value="rounded" data-parent="radius">
<div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">ROUNDED</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-33 option col" data-value="standard" data-parent="radius">
<div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">STANDARD</span>
</div>
</a>
<a href="#" class="flex-grow-1 w-33 option col" data-value="flat" data-parent="radius">
<div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
<div class="figure figure-primary top"></div>
<div class="figure figure-secondary bottom"></div>
</div>
<div class="text-muted text-part">
<span class="text-extra-small align-middle">FLAT</span>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade modal-right scroll-out-negative" id="niches" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="niches" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable full" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Niches</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="scroll-track-visible">
<div class="mb-5">
<label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
<div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
<div class="position-relative mb-3 mb-lg-5 rounded-sm">
<img src="../acorn.coloredstrategies.com/img/page/classic-dashboard.jpg" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
<div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
<a target="_blank" href="index.html" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Html
</a>
<a target="_blank" href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Laravel
</a>
<a target="_blank" href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
.Net5
</a>
</div>
</div>
</div>
</div>
<div class="mb-5">
<label class="mb-2 d-inline-block form-label">Ecommerce Platform</label>
<div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
<div class="position-relative mb-3 mb-lg-5 rounded-sm">
<img src="../acorn.coloredstrategies.com/img/page/ecommerce-platform.jpg" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
<div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
<a target="_blank" href="https://acorn-html-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Html
</a>
<a target="_blank" href="https://acorn-laravel-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Laravel
</a>
<a target="_blank" href="https://acorn-dotnet-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
.Net5
</a>
</div>
</div>
</div>
</div>
<div class="mb-5">
<label class="mb-2 d-inline-block form-label">Elearning Portal</label>
<div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
<div class="position-relative mb-3 mb-lg-5 rounded-sm">
<img src="../acorn.coloredstrategies.com/img/page/elearning-portal.jpg" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
<div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
<a target="_blank" href="https://acorn-html-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Html
</a>
<a target="_blank" href="https://acorn-laravel-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Laravel
</a>
<a target="_blank" href="https://acorn-dotnet-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
.Net5
</a>
</div>
</div>
</div>
</div>
<div class="mb-5">
<label class="mb-2 d-inline-block form-label">Service Provider</label>
<div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
<div class="position-relative mb-3 mb-lg-5 rounded-sm">
<img src="../acorn.coloredstrategies.com/img/page/service-provider.jpg" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
<div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
<a target="_blank" href="https://acorn-html-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Html
</a>
<a target="_blank" href="https://acorn-laravel-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Laravel
</a>
<a target="_blank" href="https://acorn-dotnet-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
.Net5
</a>
</div>
</div>
</div>
</div>
<div class="mb-5">
<label class="mb-2 d-inline-block form-label">Starter Project</label>
<div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
<div class="position-relative mb-3 mb-lg-5 rounded-sm">
<img src="../acorn.coloredstrategies.com/img/page/starter-project.jpg" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
<div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
<a target="_blank" href="https://acorn-html-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Html
</a>
<a target="_blank" href="https://acorn-laravel-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
Laravel
</a>
<a target="_blank" href="https://acorn-dotnet-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
.Net5
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="settings-buttons-container">
<button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
<span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
<i data-cs-icon="paint-roller" class="position-relative"></i>
</span>
</button>
<button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#niches" id="nichesButton">
<span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Niches">
<i data-cs-icon="toy" class="position-relative"></i>
</span>
</button>
<a href="https://1.envato.market/BX5oGy" target="_blank" class="btn settings-button btn-primary p-0" id="purchaseButton">
<span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Purchase">
<i data-cs-icon="cart" class="position-relative"></i>
</span>
</a>
</div>
<div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header border-0 p-0">
<button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body ps-5 pe-5 pb-0 border-0">
<input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off">
</div>
<div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
<span class="text-alternate d-inline-block m-0 me-3">
<i data-cs-icon="arrow-bottom" data-cs-size="15" class="text-alternate align-middle me-1"></i>
<span class="align-middle text-medium">Navigate</span>
</span>
<span class="text-alternate d-inline-block m-0 me-3">
<i data-cs-icon="arrow-bottom-left" data-cs-size="15" class="text-alternate align-middle me-1"></i>
<span class="align-middle text-medium">Select</span>
</span>
</div>
</div>
</div>
</div>
<script src="js/vendor/jquery-3.5.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/OverlayScrollbars.min.js"></script>
<script src="js/vendor/autoComplete.min.js"></script>
<script src="js/vendor/clamp.min.js"></script>
<script src="js/vendor/bootstrap-submenu.js"></script><script src="js/vendor/datatables.min.js"></script><script src="js/vendor/mousetrap.min.js"></script>
<script src="font/CS-Line/csicons.min.js"></script>
<script src="js/base/helpers.js"></script>
<script src="js/base/globals.js"></script>
<script src="js/base/nav.js"></script>
<script src="js/base/search.js"></script>
<script src="js/base/settings.js"></script>
<script src="js/base/init.js"></script>
<script src="js/cs/datatable.extend.js"></script><script src="js/plugins/datatable.editablerows.js"></script>
<script src="js/common.js"></script>
<script src="js/scripts.js"></script>
</body>

<!-- Mirrored from acorn-html-classic-dashboard.coloredstrategies.com/Interface.Plugins.Datatables.EditableRows.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 16:03:35 GMT -->
</html>
