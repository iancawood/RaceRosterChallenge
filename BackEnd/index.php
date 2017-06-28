<pre><?php
/**
 * RaceRoster interview questions
 * Created: 2014-05-02
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
            'name'    => 'Mike',
            'age'               => 29
            'yearsOfExperience' => 9.25
        ),
        new DateTime('2014-05-06')
    );

    // @todo Calculate the age the Interviewee when they started working using the provided methods
    // Replace 0 with the calculated answer
echo sprintf('%s started working when they were %s years old', $interview->getName(), 0) . PHP_EOL;

// @todo echo the interview date in the format "January 1, 2000" using the provided methods
echo sprintf('Today is %s', '') . PHP_EOL;

// @todo echo the Time Zone abbreviation of the current time using the provided methods (eg MST, CST, EST)
echo sprintf('The current time zone is %s', '') . PHP_EOL;

	$ageCheck = 21;
if($ageCheck = $interview->getAge()) {
	   echo sprintf('The interviewee is %d years old!', $ageCheck) . PHP_EOL;
}

} catch (InterviewException $e) {
    echo $e->getMessage();
}


// @todo Calculate and display the processing fee and the net order total when the fee is absorbed in the price.
$total 			= 456.78; // Gross
$processingFeePercentage	= 0.05;
$processingFeeFixed    = 0.10; // Always added on to the processing fee

// Calculate the following
$processingFee = 0;
$netTotal  = 0;

echo 'Processing Fee: $' . $processingFee . PHP_EOL;
echo 'Net Total: $' . $netTotal . PHP_EOL;

// @todo Recalculate and display the net total after we charge 13% HST on the processing fee
// Calculate the following based on the values above
$taxes    = 0;
$netTotal	= 0;

echo 'Net Total with taxes: ' . $netTotal . PHP_EOL;

/**
 * @todo Answer: What issues could you see happen when dealing with currency?
 *
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
    AND a.eid NOT IN(216,217,322)");

/**
 * @todo Answer: Why is this slow in the first place?
 *
 */
