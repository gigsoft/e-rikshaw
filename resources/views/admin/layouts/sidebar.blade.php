<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="{{asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">E Riksha</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar ">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
                                <li class="nav-item" >
                                    <a href="{{ route('admin.dashboard')}}" class="nav-link {{ ($layout =='dashboard') ? 'active' : '' }}" >
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                            <li class="nav-item">
								<a href="{{ route('admin.store')}}" class="nav-link {{ ($layout=='store') ? 'active' : '' }}">
									<i class="nav-icon  fas fa-store"></i>
									<p>Store</p>
								</a>
							</li>
							{{-- <i class="nav-item">
								<a href="{{ route('admin.user')}}" class="nav-link {{ ($layout=='users') ? 'active' : '' }}">
									<i class="nav-icon  fas fa-users"></i>
									<p>Users</p>
								</a>
							</i> --}}
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-cubes"></i>
                                  <p>
                                    User Management
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user')}}" class="nav-link {{ ($layout=='users') ? 'active' : '' }}">
                                            <i class="nav-icon  fas fa-users"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.role')}}" class="nav-link {{ ($layout=='roles') ? 'active' : '' }}" ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.permissions')}}" class="nav-link {{ ($layout=='permissions') ? 'active' : '' }}" >
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                </ul>
                         </li>

                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-cubes"></i>
                                  <p>
                                    Inventory
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.item')}}" class="nav-link {{ ($layout=='Items') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items</p>
                                        </a>
                                    </li>
                                </ul>
                         </li>
                            <li class="nav-item">
								<a href="{{ route('admin.purchase')}}" class="nav-link {{ ($layout=='purchase') ? 'active' : '' }}">
									<i class="fa fa-cart-plus"></i>
									<p>Stock In</p>
								</a>
							</li>
                            <li class="nav-item">
								<a href="{{ route('admin.sale')}}" class="nav-link {{ ($layout=='sales') ? 'active' : '' }}">
									<i class="nav-icon  fas fa-cart-plus"></i>
									<p>Stock Out</p>
								</a>
							</li>

                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-car"></i>
                                  <p>
                                    Vehicles
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.vehicle.index')}}" class="nav-link {{ ($layout=='vehicles') ? 'active' : '' }}">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Vehicle sales </p>
                                        </a>
                                     </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.vehicle.models')}}" class="nav-link {{ ($layout=='vehicle_model') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Vehicle Model</p>
                                        </a>
                                    </li>
                                   </ul>
                         </li>
                         <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-car"></i>
                              <p>
                                Report
                                <i class="fas fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.purchaseView')}}" class="nav-link {{ ($layout=='purchase_view') ? 'active' : '' }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Purchase Report</p>
                                    </a>
                                 </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin.salesView')}}" class="nav-link {{ ($layout=='sales_view') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales Report</p>
                                    </a>
                                </li> --}}
                               </ul>
                     </li>
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>
