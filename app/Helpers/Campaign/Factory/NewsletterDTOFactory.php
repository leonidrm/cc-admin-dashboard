<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Factory;

use App\Helpers\Campaign\DTO\NewsletterDTO;
use DateTimeImmutable;
use Exception;
use InvalidArgumentException;

class NewsletterDTOFactory
{
    protected const DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    protected const CAMPAIGN_NAME = 'Campaign Name';

    protected const VARIANT = 'Variant';

    protected const TAGS = 'Tags';

    protected const SUBJECT = 'Subject';

    protected const LIST = 'List';

    protected const SEND_TIME = 'Send Time';

    protected const SEND_WEEKDAY = 'Send Weekday';

    protected const TOTAL_RECIPIENTS = 'Total Recipients';

    protected const UNIQUE_PLACED_ORDER = 'Unique Placed Order';

    protected const PLACED_ORDER_RATE = 'Placed Order Rate';

    protected const REVENUE = 'Revenue';

    protected const UNIQUE_OPENS = 'Unique Opens';

    protected const OPEN_RATE = 'Open Rate';

    protected const TOTAL_OPENS = 'Total Opens';

    protected const UNIQUE_CLICKS = 'Unique Clicks';

    protected const CLICK_RATE = 'Click Rate';

    protected const TOTAL_CLICKS = 'Total Clicks';

    protected const UNSUBSCRIBES = 'Unsubscribes';

    protected const SPAM_COMPLAINTS = 'Spam Complaints';

    protected const SPAM_COMPLAINTS_RATE = 'Spam Complaints Rate';

    protected const SUCCESSFUL_DELIVERIES = 'Successful Deliveries';

    protected const BOUNCES = 'Bounces';

    protected const BOUNCE_RATE = 'Bounce Rate';

    protected const CAMPAIGN_ID = 'Campaign ID';

    protected const CAMPAIGN_CHANNEL = 'Campaign Channel';

    protected const WINNING_VARIANT = 'Winning Variant?';

    /**
     * @param string[] $data
     * @param int      $companyId
     * @return NewsletterDTO
     */
    public function convertToDTO(array $data, int $companyId): NewsletterDTO
    {
        $newsletterDTO = new NewsletterDTO();

        foreach ($data as $key => $datum) {
            $this->assignProperty($newsletterDTO, $key, $datum);
            $newsletterDTO->setCompanyId($companyId);
        }

        return $newsletterDTO;
    }

    protected function assignProperty(NewsletterDTO $campaignDTO, string $key, string $value)
    {
        switch ($key) {
            case self::CAMPAIGN_NAME:
                $campaignDTO->setCampaignName($value);
                break;
            case self::VARIANT:
                $campaignDTO->setVariant($value);
                break;
            case self::TAGS:
                $campaignDTO->setTags(explode(' ', $value));
                break;
            case self::SUBJECT:
                $campaignDTO->setSubject($value);
                break;
            case self::LIST:
                $campaignDTO->setList($value);
                break;
            case self::SEND_TIME:
                try {
                    $date = (DateTimeImmutable::createFromFormat(self::DATE_TIME_FORMAT, $value));
                    $campaignDTO->setSendDate($date);
                } catch ( Exception $e) {
                    throw new InvalidArgumentException(sprintf('Unknown DateTime format %s', $value));
                }

                break;
            case self::SEND_WEEKDAY:
                $campaignDTO->setSendWeekDay($value);
                break;
            case self::TOTAL_RECIPIENTS:
                $campaignDTO->setTotalRecipients((int) $value);
                break;
            case self::UNIQUE_PLACED_ORDER:
                $campaignDTO->setUniquePlacedOrders((int) $value);
                break;
            case self::PLACED_ORDER_RATE:
                $campaignDTO->setPlacedOrderRate((float) $value);
                break;
            case self::REVENUE:
                $campaignDTO->setRevenue((float) $value);
                break;
            case self::UNIQUE_OPENS:
                $campaignDTO->setUniqueOpens((int) $value);
                break;
            case self::OPEN_RATE:
                $campaignDTO->setOpenRate((float) $value);
                break;
            case self::TOTAL_OPENS:
                $campaignDTO->setTotalOpens((int) $value);
                break;
            case self::UNIQUE_CLICKS:
                $campaignDTO->setUniqueClicks((int) $value);
                break;
            case self::CLICK_RATE:
                $campaignDTO->setClickRate((float) $value);
                break;
            case self::TOTAL_CLICKS:
                $campaignDTO->setTotalClicks((int) $value);
                break;
            case self::UNSUBSCRIBES:
                $campaignDTO->setUnsubscribes((int) $value);
                break;
            case self::SPAM_COMPLAINTS:
                $campaignDTO->setSpamComplaints((int) $value);
                break;
            case self::SPAM_COMPLAINTS_RATE:
                $campaignDTO->setSpamComplaintsRate((float) $value);
                break;
            case self::SUCCESSFUL_DELIVERIES:
                $campaignDTO->setSuccesfullDeliveries((int) $value);
                break;
            case self::BOUNCES:
                $campaignDTO->setBounces((int) $value);
                break;
            case self::BOUNCE_RATE:
                $campaignDTO->setBounceRate((float) $value);
                break;
            case self::CAMPAIGN_ID:
                $campaignDTO->setCampaignIdentifier($value);
                break;
            case self::CAMPAIGN_CHANNEL:
                $campaignDTO->setCampaignChannel($value);
                break;
            case self::WINNING_VARIANT:
                $campaignDTO->setWinningVariant(filter_var($value, FILTER_VALIDATE_BOOLEAN));
                break;
            default:
                throw new InvalidArgumentException(sprintf('Unknown CSV key %s', $key));
        }
    }
}
