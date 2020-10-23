<?php

get_header();

?>
<div class="container-fluid full-width-container">
    <img alt="" class="image-fluid" src="<?php header_image(); ?>" />
</div>

<div class="container-fluid pt-2 pb-2">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Home</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.profile.</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.contact..</div>
            </div>
        </div>
        <div class="col-2 orange-background">
            Mini cart
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php

get_footer();