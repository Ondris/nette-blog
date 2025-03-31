<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\blog\app\Presentation/@layout.latte */
final class Template_6918f12467 extends Latte\Runtime\Template
{
	public const Source = 'C:\\xampp\\htdocs\\blog\\app\\Presentation/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>';
		if ($this->hasBlock('title')) /* line 8 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 8 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
        
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */;
		echo '/css/style.css">
</head>

<body>
';
		foreach ($flashes as $flash) /* line 14 */ {
			echo '    <div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 14 */;
			echo '>
        ';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 15 */;
			echo '
    </div>
';

		}

		echo '        
    <ul class="navig">
	<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 19 */;
		echo '">Články</a></li>
';
		if ($user->isLoggedIn()) /* line 20 */ {
			echo '            <li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 21 */;
			echo '">Odhlásit</a></li>
';
		} else /* line 22 */ {
			echo '            <li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:in')) /* line 23 */;
			echo '">Přihlásit</a></li>
';
		}
		echo '    </ul>

';
		$this->renderBlock('content', [], 'html') /* line 27 */;
		echo "\n";
		$this->renderBlock('scripts', get_defined_vars()) /* line 29 */;
		echo '</body>

</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '14'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 29 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3"></script>
';
	}
}
