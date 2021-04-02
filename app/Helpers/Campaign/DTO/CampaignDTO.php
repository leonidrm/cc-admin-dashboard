<?php declare(strict_types=1);

namespace App\Helpers\Campaign\DTO;

use DateTimeImmutable;

class CampaignDTO
{
    /** @var string */
    protected $campaignName;

    /** @var string */
    protected $variant;

    /** @var array */
    protected $tags;

    /** @var string */
    protected $subject;

    /** @var string */
    protected $list;

    /** @var DateTimeImmutable */
    protected $sendTime;

    /** @var string */
    protected $sendWeekDay;

    /** @var integer */
    protected $totalRecipients;

    /** @var integer */
    protected $uniquePlacedOrders;

    /** @var float */
    protected $placedOrderRate;

    /** @var float */
    protected $revenue;

    /** @var integer */
    protected $uniqueOpens;

    /** @var float */
    protected $openRate;

    /** @var integer */
    protected $totalOpens;

    /** @var integer */
    protected $uniqueClicks;

    /** @var float */
    protected $clickRate;

    /** @var integer */
    protected $totalClicks;

    /** @var integer */
    protected $unsubscribes;

    /** @var integer */
    protected $spamComplaints;

    /** @var float */
    protected $spamComplaintsRate;

    /** @var integer */
    protected $succesfullDeliveries;

    /** @var integer */
    protected $bounces;

    /** @var float */
    protected $bounceRate;

    /** @var string */
    protected $campaignId;

    /** @var string */
    protected $campaignChannel;

    /** @var bool */
    protected $winningVariant;

    /**
     * @return string
     */
    public function getCampaignName(): string
    {
        return $this->campaignName;
    }

    /**
     * @param string $campaignName
     */
    public function setCampaignName(string $campaignName): void
    {
        $this->campaignName = $campaignName;
    }

    /**
     * @return string
     */
    public function getVariant(): string
    {
        return $this->variant;
    }

    /**
     * @param string $variant
     */
    public function setVariant(string $variant): void
    {
        $this->variant = $variant;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getList(): string
    {
        return $this->list;
    }

    /**
     * @param string $list
     */
    public function setList(string $list): void
    {
        $this->list = $list;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getSendTime(): DateTimeImmutable
    {
        return $this->sendTime;
    }

    /**
     * @param DateTimeImmutable $sendTime
     */
    public function setSendTime(DateTimeImmutable $sendTime): void
    {
        $this->sendTime = $sendTime;
    }

    /**
     * @return string
     */
    public function getSendWeekDay(): string
    {
        return $this->sendWeekDay;
    }

    /**
     * @param string $sendWeekDay
     */
    public function setSendWeekDay(string $sendWeekDay): void
    {
        $this->sendWeekDay = $sendWeekDay;
    }

    /**
     * @return int
     */
    public function getTotalRecipients(): int
    {
        return $this->totalRecipients;
    }

    /**
     * @param int $totalRecipients
     */
    public function setTotalRecipients(int $totalRecipients): void
    {
        $this->totalRecipients = $totalRecipients;
    }

    /**
     * @return int
     */
    public function getUniquePlacedOrders(): int
    {
        return $this->uniquePlacedOrders;
    }

    /**
     * @param int $uniquePlacedOrders
     */
    public function setUniquePlacedOrders(int $uniquePlacedOrders): void
    {
        $this->uniquePlacedOrders = $uniquePlacedOrders;
    }

    /**
     * @return float
     */
    public function getPlacedOrderRate(): float
    {
        return $this->placedOrderRate;
    }

    /**
     * @param float $placedOrderRate
     */
    public function setPlacedOrderRate(float $placedOrderRate): void
    {
        $this->placedOrderRate = $placedOrderRate;
    }

    /**
     * @return float
     */
    public function getRevenue(): float
    {
        return $this->revenue;
    }

    /**
     * @param float $revenue
     */
    public function setRevenue(float $revenue): void
    {
        $this->revenue = $revenue;
    }

    /**
     * @return int
     */
    public function getUniqueOpens(): int
    {
        return $this->uniqueOpens;
    }

    /**
     * @param int $uniqueOpens
     */
    public function setUniqueOpens(int $uniqueOpens): void
    {
        $this->uniqueOpens = $uniqueOpens;
    }

    /**
     * @return float
     */
    public function getOpenRate(): float
    {
        return $this->openRate;
    }

    /**
     * @param float $openRate
     */
    public function setOpenRate(float $openRate): void
    {
        $this->openRate = $openRate;
    }

    /**
     * @return int
     */
    public function getTotalOpens(): int
    {
        return $this->totalOpens;
    }

    /**
     * @param int $totalOpens
     */
    public function setTotalOpens(int $totalOpens): void
    {
        $this->totalOpens = $totalOpens;
    }

    /**
     * @return int
     */
    public function getUniqueClicks(): int
    {
        return $this->uniqueClicks;
    }

    /**
     * @param int $uniqueClicks
     */
    public function setUniqueClicks(int $uniqueClicks): void
    {
        $this->uniqueClicks = $uniqueClicks;
    }

    /**
     * @return float
     */
    public function getClickRate(): float
    {
        return $this->clickRate;
    }

    /**
     * @param float $clickRate
     */
    public function setClickRate(float $clickRate): void
    {
        $this->clickRate = $clickRate;
    }

    /**
     * @return int
     */
    public function getTotalClicks(): int
    {
        return $this->totalClicks;
    }

    /**
     * @param int $totalClicks
     */
    public function setTotalClicks(int $totalClicks): void
    {
        $this->totalClicks = $totalClicks;
    }

    /**
     * @return int
     */
    public function getUnsubscribes(): int
    {
        return $this->unsubscribes;
    }

    /**
     * @param int $unsubscribes
     */
    public function setUnsubscribes(int $unsubscribes): void
    {
        $this->unsubscribes = $unsubscribes;
    }

    /**
     * @return int
     */
    public function getSpamComplaints(): int
    {
        return $this->spamComplaints;
    }

    /**
     * @param int $spamComplaints
     */
    public function setSpamComplaints(int $spamComplaints): void
    {
        $this->spamComplaints = $spamComplaints;
    }

    /**
     * @return float
     */
    public function getSpamComplaintsRate(): float
    {
        return $this->spamComplaintsRate;
    }

    /**
     * @param float $spamComplaintsRate
     */
    public function setSpamComplaintsRate(float $spamComplaintsRate): void
    {
        $this->spamComplaintsRate = $spamComplaintsRate;
    }

    /**
     * @return int
     */
    public function getSuccesfullDeliveries(): int
    {
        return $this->succesfullDeliveries;
    }

    /**
     * @param int $succesfullDeliveries
     */
    public function setSuccesfullDeliveries(int $succesfullDeliveries): void
    {
        $this->succesfullDeliveries = $succesfullDeliveries;
    }

    /**
     * @return int
     */
    public function getBounces(): int
    {
        return $this->bounces;
    }

    /**
     * @param int $bounces
     */
    public function setBounces(int $bounces): void
    {
        $this->bounces = $bounces;
    }

    /**
     * @return float
     */
    public function getBounceRate(): float
    {
        return $this->bounceRate;
    }

    /**
     * @param float $bounceRate
     */
    public function setBounceRate(float $bounceRate): void
    {
        $this->bounceRate = $bounceRate;
    }

    /**
     * @return string
     */
    public function getCampaignId(): string
    {
        return $this->campaignId;
    }

    /**
     * @param string $campaignId
     */
    public function setCampaignId(string $campaignId): void
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @return string
     */
    public function getCampaignChannel(): string
    {
        return $this->campaignChannel;
    }

    /**
     * @param string $campaignChannel
     */
    public function setCampaignChannel(string $campaignChannel): void
    {
        $this->campaignChannel = $campaignChannel;
    }

    /**
     * @return bool
     */
    public function isWinningVariant(): bool
    {
        return $this->winningVariant;
    }

    /**
     * @param bool $winningVariant
     */
    public function setWinningVariant(bool $winningVariant): void
    {
        $this->winningVariant = $winningVariant;
    }
}
