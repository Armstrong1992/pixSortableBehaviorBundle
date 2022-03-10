<?php

namespace Pix\SortableBehaviorBundle\Twig;

use Pix\SortableBehaviorBundle\Services\PositionHandler;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Description of ObjectPositionExtension
 *
 * @author Volker von Hoesslin <volker.von.hoesslin@empora.com>
 */
class ObjectPositionExtension extends AbstractExtension
{
    const NAME = 'sortableObjectPosition';

    /**
     * PositionHandler
     */
    private $positionHandler;

    /**
     * @param PositionHandler $positionHandler
     */
    public function __construct(PositionHandler $positionHandler)
    {
        $this->positionHandler = $positionHandler;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('currentObjectPosition', [$this, 'currentPosition']),
            new TwigFunction('lastPosition', [$this, 'lastPosition']),
        ];
    }

    public function currentPosition($entity): int
    {
        return $this->positionHandler->getCurrentPosition($entity);
    }

    public function lastPosition($entity): int
    {
        return $this->positionHandler->getLastPosition($entity);
    }
}
