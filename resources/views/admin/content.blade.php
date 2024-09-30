<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Dashboard</h2>
    </div>
</div>

<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-user-1"></i></div>
                            <strong>Total Clients</strong>
                        </div>
                        <div class="number dashtext-1">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-contract"></i></div>
                            <strong>Total Products</strong>
                        </div>
                        <div class="number dashtext-2">{{ $product_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-paper-and-pencil"></i></div>
                            <strong>Total Order</strong>
                        </div>
                        <div class="number dashtext-3">{{ $order_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-writing-whiteboard"></i></div>
                            <strong>Total Delivered</strong>
                        </div>
                        <div class="number dashtext-4">{{ $delivered_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
