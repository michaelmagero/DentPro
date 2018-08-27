<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
			<!-- BEGIN: Aside Menu -->
		<div 
		id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500"  >
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
					<a  href="{{ url('/admin-dash') }}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text">
									Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>
				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						Modules
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-users"></i>
						<span class="m-menu__link-text">
							Users
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Users
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-users') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Users
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-user') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add New
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-users"></i>
						<span class="m-menu__link-text">
							Patients
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Patients
									</span>
								</span>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="{{ url('all-patients-admin') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Patients
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="{{ url('new-patient-admin') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add New
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-coins"></i>
						<span class="m-menu__link-text">
							Payments
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Payments
									</span>
								</span>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="{{ url('all-payments-admin') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Payments
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="{{ url('new-payment-admin') }}" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add New Payment
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li> 
						</ul>
					</div>
				</li>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  href="#" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-calendar-2"></i>
						<span class="m-menu__link-text">
							Appointments
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Appointments
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-appointments-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Appointments
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-appointment-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										New Appointment
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-appointment-existing-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Existing Patient
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-time-1"></i>
						<span class="m-menu__link-text">
							Waiting List
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Waiting List
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-waiting-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Show List
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-list-1"></i>
						<span class="m-menu__link-text">
							Procedures
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Procedures
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-procedures') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Procedures
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-procedure') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										New Procedure
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-user-md"></i>
						<span class="m-menu__link-text">
							Insurance Providers
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Insurance Providers
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-providers') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										My Providers
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-provider') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										New Provider
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a  href="#" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-business"></i>
						<span class="m-menu__link-text">
							Expenses
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Expenses
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-expenses-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Expenses
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-expense-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Expense
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a class="m-menu__link m-menu__toggle">
						<i class="fa fa-flask m-menu__link-icon"></i>
						<span class="m-menu__link-text">
							Labwork
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Labwork
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Labworks
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Labwork
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a class="m-menu__link m-menu__toggle">
						<i class="fa fa-signal m-menu__link-icon"></i>
						<span class="m-menu__link-text">
							Reports
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Reports
									</span>
								</span>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('all-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Patients
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Payments
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Appointments
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Expenses
									</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{ url('new-labwork-admin') }}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Labworks
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>


				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						Labels
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a href="{{ url('/') }}" class="m-menu__link m-menu__toggle"
						onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
						<i class="fa fa-gears m-menu__link-icon "></i>
						<span class="m-menu__link-text">
							Settings
						</span>
					</a>

					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>


				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a href="{{ url('/logout') }}" class="m-menu__link m-menu__toggle"
						onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
						<i class="fa fa-sign-out m-menu__link-icon "></i>
						<span class="m-menu__link-text">
							Sign Out
						</span>
					</a>

					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>

				
			</ul>
		</div>
		<!-- END: Aside Menu -->
		</div>
	<!-- END: Left Aside -->
            
		<!-- begin::Quick Sidebar -->
		<!-- end::Quick Sidebar -->	