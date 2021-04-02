<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Factory;

use App\Helpers\Campaign\DTO\CampaignDTO;

class CampaignDTOFactory
{
    const CAMPAIGN_NAME = 'Campaign Name';

    const VARIANT = 'Variant';

    const TAGS = 'Tags';

    const SUBJECT = 'Subject';

    const LIST = 'List';

    const SEND_TIME = 'Send Time';

    const SEND_WEEKDAY = 'Send Weekday';

    const TOTAL_RECIPIENTS = 'Total Recipients';

    const UNIQUE_PLACED_ORDER = 'Unique PLaced Order';

    const PLACED_ORDER_RATE = 'Placed Order Rate';

    const REVENUE = 'Revenue';

    const UNIQUE_OPENS = 'Unique Opens';

    const OPEN_RATE = 'Open Rate';

    const TOTAL_OPENS = 'Total Opens';

    const UNIQUE_CLICKS = 'Unique Clicks';

    const CLICK_RATE = 'Click Rate';

    const TOTAL_CLICKS = 'Total Clicks';

    const UNSUBSCRIBES = 'Unsubscribes';

    const SPAM_COMPLAINTS = 'Spam Complaints';

    const SPAM_COMPLAINTS_RATE = 'Spam Complaints Rate';

    const SUCCESSFUL_DELIVERIES = 'Successful Deliveries';

    const BOUNCES = 'Bounces';

    const BOUNCE_RATE = 'Bounce Rate';

    const CAMPAIGN_ID = 'Campaign ID';

    const CAMPAIGN_CHANNEL = 'Campaign Channel';

    const WINNING_VARIANT = 'Winning Variant';

    /**
     * @param string[] $data
     */
    public function convertToDTO(array $data): CampaignDTO
    {
        $campaignDTO = new CampaignDTO();


    }
}
