
<section class="hero-section">
            <div class="container" style="padding-top: 0px;">
                <div class="row">
                    <?php if($myBook == null) { ?>
                        <h1>Oops, You dont have any book!</h1>
                    <?php } else { ?>
                    <?php foreach($myBook as $mb) : ?>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="<?= base_url('Home/detail/'.$mb['book_id']) ?>">
                                    <img src="<?= base_url('assets/image/poster/') . $mb['poster'] ?>" class="custom-block-image img-fluid" alt="" style="height: 500px; object-fit: cover;">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        <?= $mb['title'] ?>
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">

                                    <p><strong><?= $mb['writter'] ?></strong>
                                    </p>
                                </div>


                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <?php if($mb['status'] == 'pending') { ?>
                                        <a  class="btn custom-btn">
                                        Wait for Our response!
                                    </a>
                                    <?php } else if ( $mb["status"] == "accepted") { ?>
                                        <a href="<?= base_url('Home/Read/') .$mb['book_id'] . "/accepted"  ?>" class="btn custom-btn">
                                        Read
                                    </a>
                                    <?php } else if ($mb['status'] == "not_requested") { ?>
                                        <a href="<?= base_url('Home/Read/') .$mb['book_id'] . "/pending"  ?>" class="btn custom-btn">
                                        Read
                                    </a>
                                    <?php } else { ?>
                                        <a class="btn custom-btn">
                                        Rejected
                                    </a>
                                    <?php } ?>
                                    
                                    <a href="<?= base_url('Home/deleteCollection/' . $mb['collection_id'] . "/" . $mb['status']); ?>" class="btn custom-btn">
                                        Delete
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <?php if ($mb['liked'] == 0) { ?>
                                <a href="<?= base_url('Home/like/'.$mb['book_id']) ?>" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>
                                <?php } ?>
                                <?php if ($mb['liked'] == 1) { ?>
                                    <a href="<?= base_url('Home/like/'.$mb['book_id']) ?>" class="badge ms-auto">
                                        <i class="bi-heart-fill"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($mb['saved'] == 0) { ?>
                                    <a href="<?= base_url('Home/save/'.$mb['book_id']) ?>" class="badge ms-auto">
                                        <i class="bi-bookmark"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($mb['saved'] == 1) { ?>
                                    <a href="<?= base_url('Home/save/'.$mb['book_id']) ?>" class="badge ms-auto">
                                        <i class="bi-bookmark-fill"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php }?>



                </div>
            </div>
        </section>