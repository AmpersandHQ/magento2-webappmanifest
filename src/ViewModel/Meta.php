<?php

namespace Ampersand\WebAppManifest\ViewModel;

use Ampersand\WebAppManifest\Helper\Config;
use Ampersand\WebAppManifest\Model\Manifest as ManifestModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Meta
 *
 * @package Ampersand\WebAppManifest\ViewModel
 */
class Meta implements ArgumentInterface
{
    /**
     * @var \Ampersand\WebAppManifest\Helper\Config
     */
    private $config;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Meta constructor.
     *
     * @param \Ampersand\WebAppManifest\Helper\Config            $config
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Config $config,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->config = $config;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is manifest functionality enabled
     *
     * @return bool
     */
    public function isManifestEnabled(): bool
    {
        return $this->config->isEnabled();
    }

    /**
     * Get theme colour
     *
     * @return string|null
     */
    public function getThemeColour(): ?string
    {
        return $this->scopeConfig->getValue(
            ManifestModel::XML_PATH_DISPLAY_THEME_COLOR,
            ScopeInterface::SCOPE_STORE
        );
    }
}
