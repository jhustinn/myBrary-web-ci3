<nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.html">
                    <img style="border-radius: 100px;" src="<?= base_url('assets/image/') ?>mybrary.jpg" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                            aria-label="Search">

                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('Home') ?>">Home</a>
                        </li>
                        <?php if($this->session->userdata('user_id')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('Home/myBook') ?>">My Book</a>
                            </li>
                            <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Home/subscription') ?>">Subscribe</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>

                    <div class="ms-4">
                        <?php if(!$this->session->userdata('name')) { ?>
                        <a href="<?= base_url('Auth') ?>" class="btn custom-btn custom-border-btn smoothscroll">Sign In</a>
                        <?php } else {?>
                            <a href="<?= base_url('Auth/logout') ?>" class="btn custom-btn custom-border-btn smoothscroll">Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>