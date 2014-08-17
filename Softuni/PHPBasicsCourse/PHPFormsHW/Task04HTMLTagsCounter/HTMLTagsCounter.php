<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML5 Tags counter</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['tag_counter'])) {
    $_SESSION['tag_counter'] = 0;
}
?>
<form action="HTMLTagsCounter.php" method="post">
    <label for="tag">Enter HTML tags:</label><br/>
    <input type="text" id="tag" name="tag"/>
    <input type="submit"/>
</form>
</body>
</html>
<?php
print_result(is_correct_tag());

/**Prints the result depending on the validation of the tag
 * @param $is_valid  boolean to show if the tag is valid
 */
function print_result($is_valid)
{
    if ($is_valid) {
        echo "<h1>Valid HTML Tag!</h1>";
        echo increase_score();
    } elseif(isset($_POST['tag'])) {
        echo "<h1>Invalid HTML Tag!</h1>";
        echo $_SESSION['tag_counter'];
    }
}

/**Increases the score of the session counter
 * @return bool if the session counter is not initialized
 * @return int if the session counter is initialized returns its value
 */
function increase_score()
{
    if (isset($_SESSION['tag_counter'])) {
        $_SESSION['tag_counter']++;
        return $_SESSION['tag_counter'];
    }
    return false;
}

/**Checks if a tag is contained within an array of tags
 * @return bool
 */
function is_correct_tag()
{
    $tags = array("a",
        "abbr",
        "address",
        "area",
        "article",
        "aside",
        "audio",
        "b",
        "base",
        "bdi",
        "bdo",
        "blockquote",
        "body",
        "br",
        "button",
        "canvas",
        "caption",
        "cite",
        "code",
        "col",
        "colgroup",
        "content",
        "data",
        "datalist",
        "dd",
        "decorator",
        "del",
        "details",
        "dfn",
        "dialog",
        "div",
        "dl",
        "dt",
        "element",
        "em",
        "embed",
        "fieldset",
        "figcaption",
        "figure",
        "footer",
        "form",
        "frameset",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "head",
        "header",
        "hgroup",
        "hr",
        "html",
        "i",
        "iframe",
        "img",
        "input",
        "ins",
        "kbd",
        "keygen",
        "label",
        "legend",
        "li",
        "link",
        "main",
        "map",
        "mark",
        "menu",
        "menuitem",
        "meta",
        "meter",
        "nav",
        "noscript",
        "object",
        "ol",
        "optgroup",
        "option",
        "output",
        "p",
        "param",
        "picture",
        "pre",
        "progress",
        "q",
        "rp",
        "rt",
        "ruby",
        "s",
        "samp",
        "script",
        "section",
        "select",
        "shadow",
        "small",
        "source",
        "span",
        "strong",
        "style",
        "sub",
        "summary",
        "sup",
        "table",
        "tbody",
        "td",
        "template",
        "textarea",
        "tfoot",
        "th",
        "thead",
        "time",
        "title",
        "tr",
        "track",
        "u",
        "ul",
        "var",
        "video",
        "wbr");
    if (isset($_POST['tag'])) {
        if (in_array($_POST['tag'], $tags)) {
            return true;
        } else return false;
    }
    return false;
}

?>