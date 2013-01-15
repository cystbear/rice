<?php

namespace Rice\DeckKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translator\Entity\Translation;

/**
 * @ORM\Table(
 *     indexes={@ORM\Index(name="card_translations_lookup_idx", columns={
 *         "locale", "translatable_id"
 *     })},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="card_lookup_unique_idx", columns={
 *         "locale", "translatable_id", "property"
 *     })}
 * )
 * @ORM\Entity
 */
class CardTranslation extends Translation
{
    /**
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="translations")
     */
    protected $translatable;
}
