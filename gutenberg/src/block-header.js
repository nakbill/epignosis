// block-header.js
const { registerBlockType } = wp.blocks;
const { MediaUpload } = wp.blockEditor;
const { TextControl, TextareaControl } = wp.components;

registerBlockType('assessment/header', {
    title: 'Assessment - Header',
    category: 'assessment',
    icon: 'heading',
    description: 'Custom header block with image, title, and hyperlink',
    keywords: ['header'],

    attributes: {
        title: {
            type: 'string',
            source: 'text',
            selector: 'h2',
            default: 'How can I help you today?'
        },
        imageUrl: {
            type: 'string',
            default: ''
        },
        hyperlink: {
            type: 'string',
            default: ''
        }
    },

    edit: (props) => {
        const { attributes, setAttributes } = props;
        const { title, imageUrl, hyperlink } = attributes;

        const onSelectImage = (media) => {
            if (!media || !media.url) {
                setAttributes({ imageUrl: '' });
                return;
            }
            setAttributes({ imageUrl: media.url });
        };

        return (
            <div>
                <MediaUpload
                    onSelect={onSelectImage}
                    type="image"
                    value={imageUrl}
                    render={({ open }) => (
                        <button onClick={open}>Select Image</button>
                    )}
                />
                <TextControl
                    label="Title"
                    value={title}
                    onChange={(value) => setAttributes({ title: value })}
                />
                <TextControl
                    label="Hyperlink"
                    value={hyperlink}
                    onChange={(value) => setAttributes({ hyperlink: value })}
                />
            </div>
        );
    },

    save: (props) => {
        const { attributes } = props;
        const { title, imageUrl, hyperlink } = attributes;

        return (
            <div>
                <h2>{title}</h2>
                <a href={hyperlink}><img src={imageUrl} alt={title} /></a>
            </div>
        );
    }
});
