<pre><?php
/**
 * RaceRoster interview questions
 * Created: 2014-05-02
 *
 * Completed By: Ian Wood
 * Date: 2017-06-29
 *
 * @todo Complete all the todo item's and fix any bugs along the way
 */

use RaceRoster\Interview;

setlocale(LC_MONETARY, 'en_US');

// Bonus @todo Replace with a single Composer generated auto-loader
require __DIR__ . '/src/Interview.php';
require __DIR__ . '/src/InterviewException.php';

try {
	$interview = new Interview(
        array(
            'name'              => 'Mike',
            'age'               => 29,
            'yearsOfExperience' => 9.25,
            'nickname'          => 'Mikey'
        ),
        new DateTime('2014-05-06')
    );

echo sprintf('%s started working when they were %s years old', $interview->getName(),
        $interview->getAge() - ceil($interview->getYearsOfExperience())) . PHP_EOL; // @assumption: Assuming the have worked constantly with no breaks

echo sprintf('Today is %s', $interview->getDate()->format('F j, Y')) . PHP_EOL;

echo sprintf('The current time zone is %s', $interview->getDate()->format('T')) . PHP_EOL;

$ageCheck = 21;
if($ageCheck >= $interview->getAge()) { // @assumption: This part was a little unclear, but '>=' seems more logically than '='.
	   echo sprintf('The interviewee is %d years old!', $ageCheck) . PHP_EOL;
}

} catch (InterviewException $e) {
    echo $e->getMessage();
}


$total 			         = 456.78; // Gross
$processingFeePercentage = 0.05;
$processingFeeFixed      = 0.10; // Always added on to the processing fee // @assumption: Im treating this as $0.10.

// Calculate the following
$processingFee = floor(($total - $processingFeeFixed) * $processingFeePercentage * 100) / 100 + $processingFeeFixed; // @assumption: Rounds down to nearest cent
$netTotal      = $total - $processingFee;

echo 'Processing Fee: $' . $processingFee . PHP_EOL;
echo 'Net Total: $' . $netTotal . PHP_EOL;

// Calculate the following based on the values above
$taxPercentage = 0.13;

$taxes    = floor($processingFee * $taxPercentage * 100) / 100;
$netTotal = $netTotal - $taxes;

echo 'Net Total with taxes: ' . $netTotal . PHP_EOL;

/**
 * @todo Answer: What issues could you see happen when dealing with currency?
 *  - Different currencies have exchange rates that are constantly changing and therefore the data needs to be gathered live from a trusted source.
 *  - Math errors in programming mean customers are either being overcharged (making unhappy customers) or uncharged (RaceRoster loses money).
 */


// @todo Optimize the following query
$qry = "SELECT
        a.eid,
        a.cid,
        b.e_date
    FROM RR_CHARITY a
    JOIN RR_EVENTS b ON a.eid = b.eid
    WHERE a.cid IN (
        SELECT cid FROM RR_CHARITY_TRANSACTIONS WHERE `trnDate` <= '2013-01-01 00:00:00'
    )
    AND a.eid NOT IN(216,217,322)";

/**
 * @todo Answer: Why is this slow in the first place?
 *
 */
