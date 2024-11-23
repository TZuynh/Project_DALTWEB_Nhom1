@include('layouts.app')
@include('components.Menu.menu')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Widgets</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">General</a></li>
                                    <li class="breadcrumb-item active">Widgets</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget-first">
                                        <div class="d-flex align-items-center mb-2">
                                                <div class="bg-warning-subtle rounded-circle p-2 me-2 border border-dashed border-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#f59440" d="M5.574 4.691c-.833.692-1.052 1.862-1.491 4.203l-.75 4c-.617 3.292-.926 4.938-.026 6.022C4.207 20 5.88 20 9.23 20h5.54c3.35 0 5.025 0 5.924-1.084c.9-1.084.591-2.73-.026-6.022l-.75-4c-.439-2.34-.658-3.511-1.491-4.203C17.593 4 16.403 4 14.02 4H9.98c-2.382 0-3.572 0-4.406.691" opacity="0.5"/><path fill="#988D4D" d="M12 9.25a2.251 2.251 0 0 1-2.122-1.5a.75.75 0 1 0-1.414.5a3.751 3.751 0 0 0 7.073 0a.75.75 0 1 0-1.414-.5A2.251 2.251 0 0 1 12 9.25"/></svg>
                                                </div>

                                                <p class="mb-0 text-dark fs-15">{{ $product->name }}</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-primary-subtle rounded-circle p-2 me-2 border border-dashed border-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                </div>

                                                <p class="mb-0 text-dark fs-15">{{ $product->price }}</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-info-subtle rounded-circle p-2 me-2 border border-dashed border-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#73bbe2" d="M7 20V8.975q0-.825.6-1.4T9.025 7H20q.825 0 1.413.587T22 9v8l-5 5H9q-.825 0-1.412-.587T7 20M2.025 6.25q-.15-.825.325-1.487t1.3-.813L14.5 2.025q.825-.15 1.488.325t.812 1.3L17.05 5H9Q7.35 5 6.175 6.175T5 9v9.55q-.4-.225-.687-.6t-.363-.85zM20 16h-4v4z"/></svg>
                                                </div>

                                                <p class="mb-0 text-dark fs-15">Loại sản phẩm: {{$product->category->name}}</p>
                                            </div>

                                           
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                          

                           

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="widget-first">

                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-warning-subtle rounded-circle p-2 me-2 border border-dashed border-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#f59440" d="M5.574 4.691c-.833.692-1.052 1.862-1.491 4.203l-.75 4c-.617 3.292-.926 4.938-.026 6.022C4.207 20 5.88 20 9.23 20h5.54c3.35 0 5.025 0 5.924-1.084c.9-1.084.591-2.73-.026-6.022l-.75-4c-.439-2.34-.658-3.511-1.491-4.203C17.593 4 16.403 4 14.02 4H9.98c-2.382 0-3.572 0-4.406.691" opacity="0.5"/><path fill="#988D4D" d="M12 9.25a2.251 2.251 0 0 1-2.122-1.5a.75.75 0 1 0-1.414.5a3.751 3.751 0 0 0 7.073 0a.75.75 0 1 0-1.414-.5A2.251 2.251 0 0 1 12 9.25"/></svg>
                                                </div>

                                                <p class="mb-0 text-dark fs-15">Sản phẩm còn lại:
                                                {{ $dsChiTietSP->sum('quality') }}</p></p>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-warning-subtle rounded-circle p-2 me-2 border border-dashed border-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#f59440" d="M5.574 4.691c-.833.692-1.052 1.862-1.491 4.203l-.75 4c-.617 3.292-.926 4.938-.026 6.022C4.207 20 5.88 20 9.23 20h5.54c3.35 0 5.025 0 5.924-1.084c.9-1.084.591-2.73-.026-6.022l-.75-4c-.439-2.34-.658-3.511-1.491-4.203C17.593 4 16.403 4 14.02 4H9.98c-2.382 0-3.572 0-4.406.691" opacity="0.5"/><path fill="#988D4D" d="M12 9.25a2.251 2.251 0 0 1-2.122-1.5a.75.75 0 1 0-1.414.5a3.751 3.751 0 0 0 7.073 0a.75.75 0 1 0-1.414-.5A2.251 2.251 0 0 1 12 9.25"/></svg>
                                                </div>

                                                <p class="mb-0 text-dark fs-15">Số sản phẩm đã bán:</p></p>
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>


                        </div>
                <div class="col-md-6 text-end">
    <a href="{{ route('product.update', ['id' => $product->id]) }}" class="btn btn-primary" style="margin-bottom: 15px">
        Cập nhật thông tin
    </a>
</div>
<div class="col-md-6 text-end">
    <a href="{{ route('detail.create', ['product' => $product->id]) }}" class="btn btn-primary" style="margin-bottom: 15px">
       Them chi tiet
    </a>
</div>
                      
      

        
    </div>

                        <!-- start row -->
                        
                        <!-- Task table -->
                        <div class="table-responsive">
    <table class="table table-traffic mb-0">
        <thead>
            <tr>
                <th>Size</th>
                <th>Màu</th>
                <th>Số Lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsChiTietSP as $productDetail)
                <tr>
                    <td>
                        <a href="#" class="text-reset">
                            {{ $productDetail->size->name ?? 'N/A' }}
                        </a>
                    </td>
                    <td class="text-nowrap text-reset">
                        {{ $productDetail->color->color_name ?? 'N/A' }}
                    </td>
                    <td class="text-nowrap">
                        {{ $productDetail->quality }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

                    <!-- container-fluid -->
                </div> <!-- content -->


                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- for basic area chart -->
        <script src="../../../apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Widgets Init Js -->
        <script src="assets/js/pages/widgets.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>

<!-- Mirrored from zoyothemes.com/silva/html/widgets by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 03:55:06 GMT -->
</html> 