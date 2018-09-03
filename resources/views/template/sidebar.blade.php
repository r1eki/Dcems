<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{!! Auth::user()->name !!}</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;{!! Auth::user()->phone !!}
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="{{ url('home/main') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="{{ url('home/user') }}">
										<i class="icon-user"></i><span>Management User</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/roles') }}">
										<i class="icon-key"></i><span>Management Role</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/services') }}">
										<i class="icon-gear"></i><span>Management Layanan</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/slider') }}">
										<i class="icon-gallery"></i><span>Management Slider</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/clients') }}">
										<i class="icon-people"></i><span>Management Client</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/testimoni') }}">
										<i class="icon-people"></i><span>Management Testimoni</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/portfolio') }}">
										<i class="icon-image5"></i><span>Management Portfolio</span>
									</a>
								</li>
								<li>
									<a href="#"><i class="icon-newspaper"></i> <span>Management Berita</span></a>
									<ul>
										<li><a href="{{ url('home/category') }}">Kategori Berita</a></li>
										<li><a href="{{ url('home/news') }}">List Berita</a></li>
									</ul>
								</li>
								<li>
									<a href="{{ url('home/subscriber') }}">
										<i class="icon-magazine"></i> <span>Management Subscriber</span>
									</a>
								</li>
								<li>
									<a href="{{ url('home/helpdesk') }}">
										<i class="icon-phone"></i> <span>Management Contact Service</span>
									</a>
								</li>
								<!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>