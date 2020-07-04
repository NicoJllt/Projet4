<?php
class Test
{
    private string $content = "start";
    function setContent(string $content)
    {
        $this->content = $content;
    }
    function content(): string
    {
        return $this->content;
    }
}

function modifyContent1(Test $t): void
{
    $t->setContent("modified");
}

function modifyContent2(Test $t): void
{
    $t = new Test();
    $t->setContent("modified");
}

echo "<h2>Premier test : sans créer d'objet (dans la fonction modifyContent1)</h2>";
$test = new Test();
echo "<p>Valeur avant l'appel de la fonction : " . $test->content() . '</p>';
modifyContent1($test);
echo "<p>Valeur après l'appel de la fonction : " . $test->content() . '</p>';

echo "<h2>Second test : en créant un objet (dans la fonction modifyContent2)</h2>";
$test = new Test();
echo "<p>Valeur avant l'appel de la fonction : " . $test->content() . '</p>';
modifyContent2($test);
echo "<p>Valeur après l'appel de la fonction : " . $test->content() . '</p>';

echo "<p>Conclusion : il ne faut pas créer un nouvel objet du même nom que le paramètre si on ne veut pas casser le modèle !!!</p>";
