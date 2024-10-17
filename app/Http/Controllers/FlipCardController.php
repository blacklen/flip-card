<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FlipCardController extends Controller
{
    const QUESTS = [
        [
            'id' => 1,
            'title' => 'What\'s a numpad?',
            'description' => 'Some people might remember T9 phone inputs, in which the numbers 2 to 9 have associated letters, and 0 acts as a space. Key 2 has "abc", 3 has "def" etc:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre><br>  1   2   3<br>     abc def<br><br>  4   5   6<br> ghi jkl mno<br><br>  7   8   9<br>pqrs tuv wxyz<br>     <br>      0<br>      _<br></pre></div><br>Note that 0 is a space, not an underscore!<br> <br>To get a letter you press the button a certain number of times - pressing 2 once gives "a", twice gives "b".<br>The input is a list of number pairs: a key and the number of times it has been pressed. For example, "7 3" would be "r". What is the message this input produces?<br><br>',
            'input' => '/storage/data/challenge-1-input.txt',
            'answer' => 'oh so they have internet on computers now',
            'rate' => '1/10',
            'hint' => 'Đây là một món ăn',
            'value' => 'A',
        ],
        [
            'id' => 2,
            'title' => 'Rose by any other name',
            'description' => 'Setting a colour attribute on your webpage can be much more interesting than it appears - HTML/CSS will take any string and convert it into a hexadecimal representation for use in a webpage. For instance, text with tag:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>body bgcolor="kdb4life"</pre></div>produces a nice blue colour.<br>The conversion process happens like so:<div class="container bd-container-body-mono bg-light text-dark" "=""><pre>  Set the string\'s non-hexadecimal characters to 0.<br>  Pad the string length to the next multiple of 3.<br>  Split the result into 3 equal sections.<br>  The first two digits of each remaining section are the hex components.<br></pre></div><br>Above, "kdb4life" as an input string becomes <br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>0d40fe</pre></div><br>What is the six-character colour hex output of your input string?<br><br>',
            'input' => '/storage/data/challenge-2-input.txt',
            'answer' => 'd0000d',
            'rate' => '5/10',
            'hint' => 'Có những người sẽ không thích',
            'value' => 'H',
        ],
        [
            'id' => 3,
            'title' => 'One is all you need',
            'description' => 'You\'ve found a table which is supposed to record only unique values in the order they appeared. Looking closely, you realise that some of the values occur multiple times. Consulting the documentation, you see the original system was designed to only have data appended, so there was no way to correct broken inputs. <br><br>Instead, a record appearing more than once means that everything between the first instance of that record up to the latest occurrence was incorrect, and should be discarded. Values after this occurrence are treated as if those records in between hadn\'t existed. What is the sum of the values returned from your input after this process has been applied?<br>For example input: <br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>1 4 3 2 4 7 2 6 3 6<br><br>f[1 4 3 2 4 7 2 6 3 6]<br>1 4 7 2 6</pre></div>In this case, the summed answer would be 20.<br><br>',
            'input' => '/storage/data/challenge-3-input.txt',
            'answer' => '321',
            'rate' => '5/10',
            'hint' => 'Chữ cái ở vị trí đầu tiên',
            'value' => 'C',
        ],
        [
            'id' => 4,
            'title' => 'This is good co-primen',
            'description' => 'Co-primes, while not being the most exciting thing in the world, are extremely useful for cryptography (among other things). Numbers are co-prime if they don\'t share any common factors above 1.<br><br>For example, 15 and 8 are not prime, but have factors of 3 5 and 2 4 respectively, and so are co-prime. 15 and 9 are not co-prime, since they share a factor of 3.<br><br>For your input number, what is the sum of the positive co-primes of that number which are less than that number?<br><br>For example, the coprimes of 15 are<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>1 2 4 7 8 11 13 14</pre></div><br><br>If your input was 15, the answer would be 60.<br><br>',
            'input' => '/storage/data/challenge-4-input.txt',
            'answer' => '195153719200',
            'rate' => '4/10',
            'hint' => 'Đơn giản',
            'value' => 'H',
        ],
        [
            'id' => 5,
            'title' => 'Let me count the ways',
            'description' => 'It can be useful to know how to break down a number - usually this is done with factors, but instead, let\'s try it with summable components. For a number, you can work out the possible combinations of non-negative integers which sum to that number. For example, these are the combinations of three numbers which sum to 3:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>0 0 3<br>0 1 2<br>0 2 1<br>0 3 0<br>1 0 2<br>1 1 1<br>1 2 0<br>2 0 1<br>2 1 0<br>3 0 0</pre></div><br><br>The digit "1" occurs 9 times above. For your input, how many times does the character "1" appear in all combinations summing to that number?<br><br>Note the number "11" would be twice, "21" once, so 1 21 11 would be 4 times.<br><br>',
            'input' => '/storage/data/challenge-5-input.txt',
            'answer' => '6927',
            'rate' => '3/10',
            'hint' => 'Có màu trắng',
            'value' => 'O',
        ],
        [

            'id' => 6,
            'title' => 'word wore more mare maze',
            'description' => 'As a child, nothing is more difficult and mysterious than the game which apparently has no name, but goes like this:<br><br>You have a starting word, and an ending word - changing one letter at a time and always maintaining a real word, make a chain of words from the start to the end. For example:<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>fly<br>...<br>try<br></pre></div><br>Results in<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>fly<br>fry<br>try<br></pre></div><br><br>This results in a chain three words long, including the starting and ending words.<br><br>Using the word list <a href="https://challenges.aquaq.co.uk/static/words.txt" target="_blank" previewlistener="true">here</a> as a list of valid words, find the shortest full chain of each word pair in the input. The answer is the product of the lengths of each chain - so if the input was<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>fly,try<br>try,fly<br>word,maze</pre></div><br>The lengths of each chain would be 3 3 5, and the product of these would be the answer: 45.<br><br>',
            'input' => '/storage/data/challenge-6-input.txt',
            'answer' => '97920000',
            'rate' => '10/10',
            'hint' => 'Xuất hiện trong tác phẩm văn học',
            'value' => 'A',
        ],
        [
            'id' => 7,
            'title' => 'Cron Flakes',
            'description' => 'While out shopping, you realise you\'re not sure how much milk and cereal you have in the house. What you do have however is a handy terminal session (preferably running kdb+, but other languages are acceptable), and a csv of milk and cereal purchases (in ml and g, respectively), which you\'ve updated every time you\'ve been shopping in the last while.<br><br>Once per day, if you have enough of both, you use 100ml of milk and 100g of cereal. Milk always expires on the 5th day after you buy it, after you use it that morning, and you always use your oldest unexpired milk to avoid waste. You always buy new milk after breakfast, and cereal before breakfast (i.e. never use milk as soon as you get it, but you can use cereal as soon as you get it if you already have milk).<br><br>For example, if on day 1 you buy 1000ml of cereal and 1000g of milk, and then on day 5 you buy 1000ml of milk, your milk and cereal up to day six would look like this:<br><br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>day milk cereal<br>---------------<br>1   1000 1000<br>2   900  900<br>3   800  800<br>4   700  700<br>5   1600 600<br>6   1000 500<br></pre></div><br>On days 1, 2, 3, and 4, you use 100g each of milk and cereal, without any new milk or cereal coming in. On day 5, you have breakfast as normal and later get your 1000g of milk. On day 6, you use 100g of your oldest milk and none of your newest milk, then throw the old milk away, leaving you with 1000g of milk, while cereal has steadily reduced to 500g.<br><br>It\'s currently one day after the last date in your input - what\'s the sum of your remaining milk and cereal?<br><br>',
            'input' => '/storage/data/challenge-7-input.txt',
            'answer' => '1100',
            'rate' => '8/10',
            'hint' => 'Giải cảm',
            'value' => 'N',
        ],
        [

            'id' => 8,
            'title' => 'Blackjack',
            'description' => 'Imagine the thrill of the casino, right there in your terminal.<br><br>Magnificent.<br><br>Today, we\'re playing the most sedate games of not-quite-blackjack of which you could concieve. Your input is a set of decks of cards, shuffled together. Draw from this deck, in order, one card at a time. Any time you hit a total card value of 21, you win! Any time you go over 21 you lose. In either case, once a game is done, immediately start again with the next card, and repeat until there are no cards left.<br><br>It\'s important to note while playing you can consider aces to be 11 or 1 at any time, while 2 to 10 have their face value and Jack, Queen and King are worth 10.<br><br>An example play is below<br><div class="container bd-container-body-mono bg-light text-dark" "=""><pre>input: 3 A K 9 A 7 4 9 <br>Draw a 3: current total 3<br>Draw an ace: current total 4 or 14<br>Draw a King: current total 14 or 24<br>Draw a 9: current total 23 or 33<br>This is a loss. Start again with the next card:<br>Draw an ace: current total 1 or 11<br>Draw a 7: current total 8 or 18<br>Draw a 4: current total 12 or 22<br>Draw a 9: current total 21 or 31<br>This is a win!<br></pre></div>So for this input, you win one game. How many games do you win with the input for this challenge?<br><br>',
            'input' => '/storage/data/challenge-8-input.txt',
            'answer' => '256',
            'rate' => '6/10',
            'hint' => 'có màu xanh',
            'value' => 'H',
        ]
    ];

    /**
     * Show flip card
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $quests = new collection(self::QUESTS);
        $quests = $quests->map(function ($quest) {
            return Arr::only($quest, ['id', 'title', 'description', 'rate', 'input']);
        });

        return view('flip-card', ['quests' => $quests]);
    }

    /**
     * Submit answer
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit($id, Request $request)
    {
        $answer = $request->input('answer');

        $quest = Arr::first(self::QUESTS, function ($quest) use ($id) {
            return $quest['id'] == $id;
        });

        if ($quest['answer'] == $answer) {
            return response()->json($quest);
        } else {
            return response()->json(['error' => 'Wrong answer']);
        }
    }
}
