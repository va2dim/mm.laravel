<?php
$GLOBALS['commentDisabled'] = "";
/*if(!Auth::check())
    $GLOBALS['commentDisabled'] = "disabled";*/
$GLOBALS['commentClass'] = -1;
?>
<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="ui dividing header">Comments</h3>ss
    <div class="ui threaded comments" id="{{ $comment_item_id }}-comment-0">
        <button class="ui basic small submit button" id="write-comment"
                data-form="#{{ $comment_item_id }}-comment-form">Write comment
        </button>
        <form class="ui laravelComment-form form" id="{{ $comment_item_id }}-comment-form" data-parent="0"
              data-item="{{ $comment_item_id }}" style="display: none;">
            <div class="field">
                <input type="text" id="0-input" placeholder="Автор, по шаблону: <Фамилия> <Имя>"/>
                <textarea id="0-textarea" rows="2" placeholder="Текст" {{ $GLOBALS['commentDisabled'] }}></textarea>
                <!--if(!Auth::check())
                    1<small>Please Log in to comment</small>1
                endif-->
            </div>
            <input type="submit" class="ui basic small submit button" value="Comment" {{ $GLOBALS['commentDisabled'] }}>
        </form>
        <?php
        $GLOBALS['commentVisit'] = array();

        function dfs($comments, $comment){
        $GLOBALS['commentVisit'][$comment->id] = 1;
        $GLOBALS['commentClass']++;
        ?>
        <div class="comment show-{{ $comment->item_id }}-{{ (int)($GLOBALS['commentClass'] / 5) }}"
             id="comment-{{ $comment->id }}">
            <a class="avatar">
                <img src="{{ $comment->avatar }}">
            </a>
            <div class="content">
                <a class="author" url="{{ $comment->url or '' }}"> {{ $comment->name }} | {{ $comment->author }} </a>
                <div class="metadata">
                    <span class="date">{{ $comment->updated_at->diffForHumans() }}</span>
                </div>
                <div class="text">
                    {{ $comment->comment }}
                </div>
                <div class="actions">
                    <a class="{{ $GLOBALS['commentDisabled'] }} reply reply-button"
                       data-toggle="{{ $comment->id }}-reply-form">Reply</a>
                </div>
                {{ \risul\LaravelLikeComment\Controllers\CommentController::viewLike('comment-'.$comment->id) }}
                <form id="{{ $comment->id }}-reply-form" class="ui laravelComment-form form"
                      data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
                    <div class="field">
                        <input type="text" id="{{ $comment->id }}-input"
                               placeholder="Автор, по шаблону: <Фамилия> <Имя>">
                        <textarea id="{{ $comment->id }}-textarea" rows="2"
                                  placeholder="Текст" {{ $GLOBALS['commentDisabled'] }}></textarea>
                        <!--if(!Auth::check())
                            2<small>Please Log in to comment</small>2
                        endif-->
                    </div>
                    <input type="submit" class="ui basic small submit button"
                           value="Comment" {{ $GLOBALS['commentDisabled'] }}>
                </form>
            </div>
            <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
                <?php
                foreach ($comments as $child) {
                    if ($child->parent_id == $comment->id && !isset($GLOBALS['commentVisit'][$child->id])) {
                        dfs($comments, $child);
                    }
                }
                echo "</div>";
                echo "</div>";
                }

                $comments = \risul\LaravelLikeComment\Controllers\CommentController::getComments($comment_item_id);
                foreach ($comments as $comment) {
                    if (!isset($GLOBALS['commentVisit'][$comment->id])) {
                        dfs($comments, $comment);
                    }
                }
                ?>
            </div>
            <button class="ui basic button" id="showComment" data-show-comment="0"
                    data-item-id="{{ $comment_item_id }}">Show comments
            </button>
        </div>
