<?php
function cleanNonAsciiCharactersInString($orig_text) {

    $text = $orig_text;

    // Single letters
    $text = preg_replace("/[áàảãạâấầẩẫậăắằẳẵặ]/u",      "a", $text);
    $text = preg_replace("/[ÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶ]/u",     "A", $text);
    $text = preg_replace("/[B]/u",     "b", $text);
    $text = preg_replace("/[C]/u",     "c", $text);
    $text = preg_replace("/[đĐD]/u",             "d", $text);
    $text = preg_replace("/[éèẻẽẹêếềểễệÉÈẺẼẸÊẾỀỂỄỆ]/u", "e", $text);
    $text = preg_replace("/[F]/u",     "f", $text);
    $text = preg_replace("/[G]/u",     "g", $text);
    $text = preg_replace("/[H]/u",     "h", $text);
    $text = preg_replace("/[íìỉĩịÍÌỈĨỊ]/u",       "i", $text);
    $text = preg_replace("/[J]/u",     "j", $text);
    $text = preg_replace("/[K]/u",     "k", $text);
    $text = preg_replace("/[L]/u",     "l", $text);
    $text = preg_replace("/[M]/u",     "m", $text);
    $text = preg_replace("/[N]/u",     "n", $text);
    $text = preg_replace("/[óòỏõọôốồổỗộơợỡởờớÓÒỎÕỌÔỘỖỔỒỐƠỜỚỞỠỢ]/u", "o", $text);
    $text = preg_replace("/[P]/u",     "p", $text);
    $text = preg_replace("/[Q]/u",     "q", $text);
    $text = preg_replace("/[R]/u",     "r", $text);
    $text = preg_replace("/[S]/u",     "s", $text);
    $text = preg_replace("/[T]/u",     "t", $text);
    $text = preg_replace("/[úùủũụưứừửữựÚÙỦŨỤƯỨỪỬỮỰ]/u",     "u", $text);
    $text = preg_replace("/[V]/u",     "v", $text);
    $text = preg_replace("/[W]/u",     "w", $text);
    $text = preg_replace("/[X]/u",     "x", $text);
    $text = preg_replace("/[ýỳỷỹỵÝỲỶỸỴ]/u",       "y", $text);
    $text = preg_replace("/[Z]/u",     "z", $text);

    return $text;
}

?>