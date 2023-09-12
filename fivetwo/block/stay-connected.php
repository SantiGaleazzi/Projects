<?php
    $title_subscribe    = get_field('title_subscribe');

    $logo           = get_field('logo_header', 'option');
    $title          = get_field('title_quiz_lightbox', 'option');
    $subtitle       = get_field('subtitle_quiz_lightbox', 'option');
    $introduction   = get_field('introduction_quiz_lightbox', 'option');

    $title_quiz         = get_field('title_quiz');
    $script_quiz        = get_field('script_quiz');
    $button_quiz        = get_field('button_quiz');
?>

<div class="stayConnected">
    <div class="stayConnected__container grid-container">
        <div class="grid-x align-center stayConnected__container-green">
            <div class="flex-container flex-dir-column medium-flex-dir-row align-center-middle">
                <div>
                    <?php if ($title_quiz): ?>
                        <div class="stayConnected__quiz text-center medium-text-right">
                            <?php echo $title_quiz; ?>
                        </div>
                    <?php endif ?>

                    <?php if ($script_quiz): ?>
                        <div class="stayConnected__onlineQuiz text-center">
                            <?php echo $script_quiz; ?>
                        </div>
                    <?php endif ?>
                </div>
                <div>
                    <?php if ($button_quiz): ?>
                        <span class="stayConnected__quiz-button button" data-open="quizModal"><?php echo $button_quiz; ?></span>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>


